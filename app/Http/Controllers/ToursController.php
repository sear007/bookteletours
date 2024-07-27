<?php

namespace App\Http\Controllers;

use App\Events\SendTourReceiptEvent;
use App\Models\ReservationTour;
use App\Models\Tour;
use App\Models\TourType;
use App\Models\TourTypeTime;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class ToursController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->only([
      'showCheckout', 
      'showPayment',
      'postCheckout',
    ]);
  }

  public function index(Request $request){
    $tours = Tour::
      with(['tourTypes', 'location', 'featureImage', 'tourImages'])
      ->when($request->province, function($q) use ($request){
        return $q->where('province_id', $request->province);
      })
      ->paginate();
    return view('pages.tours.index', compact('tours'));
  }
  public function show(Request $request){
    $tour = Tour::with('tourTypes')
      ->find($request->tourId);
    return view('pages.tours.show', compact('tour'));
  }
  public function showTourType(Request $request){
    $tourType = TourType::with([
      'tour', 'featureImage', 'tourTypeImages', 'tourTimes'
      ])
      ->find($request->tourTypeId);
    return view('pages.tours.showTourType', compact('tourType'));
  }
  public function showCheckout(Request $request){
    $tourType = TourType::with(['tour', 'featureImage', 'tourTypeImages'])
      ->find($request->tourTypeId);
    return view('pages.tours.showCheckout', compact('tourType'));
  }
  public function showPayment(Request $request){
    $payment = ReservationTour::with(['tour', 'tourType'])
      ->whereTranId($request->tranId)->first();
    if($request->status === 'APPROVED'){
      $ABAPaymentStatus = $this->getPaymentStatus($payment->tran_id, $payment->req_time);
      if(!empty($ABAPaymentStatus['payment_status']) && $ABAPaymentStatus['payment_status'] === 'APPROVED'){
        if($payment->payment_status !== 'APPROVED'){
          $payment->payment_status = 'APPROVED';
          $payment->update();
          event(new SendTourReceiptEvent($payment));
        }
      } else {
        return redirect()->route('tour.showPayment', [
          'tranId' => $payment->tran_id,
          'status' => 'processing',
        ]);
      }
    }
    return view('pages.tours.showPayment', compact('payment'));
  }

  public function getPaymentStatus($tran_id, $req_time){
    $data = [];
    $data['merchant_id'] = env('ABA_PAYWAY_MERCHANT_ID');
    $data['req_time'] = $req_time;
    $data['tran_id'] = $tran_id;
    $data['hash'] = getHash($data);
    $formData['req_time'] = $data['req_time'];
    $formData['merchant_id'] = env('ABA_PAYWAY_MERCHANT_ID');
    $formData['tran_id'] = $data['tran_id'];
    $data['hash'] = getHash($formData);
    $url = env('ABA_PAYWAY_API_CHECKOUT_STATUS_URL');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_PROXY, null);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!
    $result = curl_exec($ch);
    $result = json_decode($result, true);
    return $result;
  }

  public function postCheckout(Request $request, $tourTypeId){
    $price = 0;
    $tourType = TourType::with(['tour'])
      ->find($tourTypeId);
    $time = TourTypeTime::find($request->time);
    $price = $price + ($tourType->price_solo * $request->quantity_solo);
    $price = $price + ($tourType->price_group * $request->quantity_group);
    $data = $request->all();
    $data['price'] = $price;
    $data['branch_id'] = $tourType->tour->id;
    $data['tour_type_id'] = $tourType->id;
    $data['tran_id'] = getUniqueTranId();
    $data['req_time'] = date('YmdHisu');
    $data['hashData'] = $this->hasData($data, true);
    $data['hash'] = $this->getHash($data['hashData']);
    $data['payment_status'] = 'processing';
    $data['price_solo'] = $tourType->price_solo;
    $data['price_group'] = $tourType->price_group;
    $data['time'] = $time->name;
    $data['tour_type_time_id'] = $time->id;
    ReservationTour::create($data);
    return response()->json([
      'success' => true,
      'urlRedirect' => $this->callbackUrl(
        $data['tran_id'], 
        $data['payment_status'],
      ),
    ]);
  }

  public function hasData($data){
    return array(
      "req_time" => $data['req_time'],
      "merchant_id" => env('ABA_PAYWAY_MERCHANT_ID'),
      "tran_id" => $data['tran_id'],
      "amount" => number_format($data['price'], 2),
      "type" => "purcahse",
      "payment_option" => $data['payment_option'],
      "cancel_url" => $this->callbackUrl($data['tran_id'], 'cancel'),
      "continue_success_url" => $this->callbackUrl($data['tran_id'], 'APPROVED'),
    );
  }

  function callbackUrl($tran_id, $status){
    return route('tour.showPayment', [
      'tranId'=> $tran_id,
      'status'=> $status,
    ]);
  }

  function getHash($data = []){
    $concatenatedValues = '';
    foreach ($data as $value) {
      $concatenatedValues .= $value;
    }
    return base64_encode(
      hash_hmac(
        'sha512', 
        $concatenatedValues, 
        env('ABA_PAYWAY_API_KEY'), true
      )
    );
  }
  
  public function getPaymentPdf($tran_id)
    {
      $payment = ReservationTour::with(['tour', 'tourType'])
      ->whereTranId($tran_id)->first();
      $view = view('pages.tours.invoice', compact('payment', 'payment'));
        $pdf = new Mpdf([
            'mode' => 'UTF-8',
            'format' => 'A4-P',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 5,
            'margin_footer' => 5,
        ]);
        $pdf->WriteHTML($view);
        $pdf->Output('invoice.pdf', 'D');
    }
}
