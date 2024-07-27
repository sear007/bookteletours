<form 
  id="aba_merchant_request" 
  action="{{env('ABA_PAYWAY_API_CHECKOUT_URL')}}"
  enctype="multipart/form-data" 
  method="POST" 
  target="aba_webservice" 
>
  <input type="hidden" name="req_time" value="{{$payment->hashData['req_time']}}" />
  <input type="hidden" name="merchant_id" value="{{$payment->hashData['merchant_id']}}" />
  <input type="hidden" name="tran_id" value="{{$payment->hashData['tran_id']}}" />
  <input type="hidden" name="amount" value="{{$payment->hashData['amount']}}" />
  <input type="hidden" name="type" value="{{$payment->hashData['type']}}" />
  <input type="hidden" name="payment_option" value="{{$payment->hashData['payment_option']}}" />
  <input type="hidden" name="cancel_url" value="{{$payment->hashData['cancel_url']}}" />
  <input type="hidden" name="continue_success_url" value="{{$payment->hashData['continue_success_url']}}" />
  <input type="hidden" name="hash" value="{{$payment->hash}}" />
</form>

<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-dark font-weight-bold mb-0">Pay Invoice</h6>
        <a href="{{route('tour.getPaymentPdf', $payment->tran_id)}}" class="font-weight-bold text-dark "><i class="fa fa-lg fa-file-pdf"></i></a>
    </div>
    <div class="card-body">
        <p class="mb-0 text-dark">Payment amount</p>
        <h3>{{ price($payment->price) }}</h3>
        <div class="bg-light border p-3 small">
            <p class="mb-0 text-dark">Name: <span class="text-muted">{{ $payment->name }}</span></p>
            <p class="mb-0 text-dark">Email: <span class="text-muted">{{ $payment->email }}</span></p>
            <p class="mb-0 text-dark">Tel: <span class="text-muted">{{ $payment->telephone ?? 'N/A' }}</span></p>
            <p class="mb-0 text-dark">Site: <span class="text-muted">{{ $payment->tour->name }}</span></p>
            <p class="mb-0 text-dark">Tour Type: <span class="text-muted">{{ $payment->tourType->name }}</span></p>
            <p class="mb-0 text-dark">Price Solo: <span class="text-muted">{{ price($payment->price_solo) }} x {{ $payment->quantity_solo }}</span></p>
            <p class="mb-0 text-dark">Price Solo: <span class="text-muted">{{ price($payment->price_group) }} x {{ $payment->quantity_group }}</span></p>
            <p class="mb-0 text-dark">Time: <span class="text-muted">{{$payment->time}}</span></p>
            <p class="mb-0 text-dark">Date: <span class="text-muted">{{$payment->date}}</span></p>
            <p class="mb-0 text-dark">Pickup: <span class="text-muted">{{$payment->pick_location ?? 'N/A'}}</span></p>
            <p class="mb-0 text-dark">Payment Method: <span class="text-muted">{{$payment->payment_option}}</span></p>
        </div>
        <button id="checkout_button" class="w-100 btn btn-primary mt-3 font-weight-bold"><i
                class="fa fa-dollar mr-1"></i>Pay Now</button>
    </div>
</div>
