<?php

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Str;


if (!function_exists('slug')) {
    function slug($name)
    {
        return Str::slug($name);
    }
}

if (!function_exists('getImagesUrl')) {
    function getImagesUrl($data)
    {
        $images = [];
        foreach ($data as $key => $image) {
            $images[$key] = $image->filename;
        }
        return $images;
    }
}

if (!function_exists('limitString')) {
    function limitString($strings = '', $limit = 100)
    {
        return Str::limit($strings, $limit);
    }
}

if (!function_exists('price')) {
    function price($price = 0, $currency = 'usd')
    {
        switch ($currency) {
            case "usd":
                return "$" . number_format($price, 2);
        }
    }
}

if (!function_exists('checkPaymentStatus')) {
    function checkPaymentStatus($data = [])
    {
        try {
            $formData['req_time'] = $data['req_time'];
            $formData['merchant_id'] = env('ABA_PAYWAY_MERCHANT_ID');
            $formData['tran_id'] = $data['tran_id'];
            $data['hash'] = getHash($formData);
            $url = 'https://checkout.payway.com.kh/api/payment-gateway/v1/payments/check-transaction';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_PROXY, null);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!
            $result = curl_exec($ch); //Result Json
            $result = json_decode($result, true);
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    if (!function_exists('getHashData')) {
        function getHashData($data = [])
        {
            return array(
                "req_time" => $data['req_time'],
                "merchant_id" => env('ABA_PAYWAY_MERCHANT_ID'),
                "tran_id" => $data['tran_id'],
                "amount" => number_format($data['price'], 2),
                "type" => "purcahse",
                "payment_option" => $data['payment_option'],
                "cancel_url" => base64_encode(getCheckoutRouteStatus($data, 'cancel')),
                "continue_success_url" => getCheckoutRouteStatus($data, 'approved'),
            );
        }
    }

    if (!function_exists('getCheckoutRouteStatus')) {
        function getCheckoutRouteStatus($data, $status)
        {
            return route('checkout.index', [
                'hotel_id' => $data['branch_id'],
                'room_id' => $data['room_type_id'],
                'tran_id' => $data['tran_id'],
                'status' => $status,
            ]);
        }
    }

    if (!function_exists('getHash')) {
        function getHash($data = [])
        {
            $concatenatedValues = '';
            foreach ($data as $value) {
                if (!empty($value)) {
                    $concatenatedValues .= $value;
                }
            }
            return base64_encode(hash_hmac('sha512', $concatenatedValues, env('ABA_PAYWAY_API_KEY'), true));
        }
    }

    if (!function_exists('displayQuantityDay')) {
        function displayQuantityDay($count)
        {
            return $count. ' ' .($count > 1 ? 'days' : 'day');
        }
    }

    if (!function_exists('getUniqueTranId')) {
        function getUniqueTranId()
        {
            $unique_id = str_replace(".","",microtime(true)).rand(000,999);
            return $unique_id;
        }
    }



}
