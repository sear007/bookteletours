@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
    @include('components.banner', [
        'title' => $payment->tour->name,
        'subTitle' => $payment->tour->name_other,
        'background' => '',
    ])
    
    <div class="container container-show-page mt-3">
        <div class="p-3 bg-white shadow">
            <div class="row justify-content-center">
                @include('pages.tours.components.step', [
                  'step' => request('status') === 'processing' 
                    ? 2 
                    : 3,
                ])
                <div class="col-md-6 my-5">
                  @if (request('status') === 'processing')
                    @include('pages.tours.components.form-payment', [
                      'payment' => $payment
                    ])
                  @elseif(request('status') === 'APPROVED')
                    @include('pages.tours.components.success-payment', [
                      'payment' => $payment
                    ])
                  @else 
                  @include('pages.tours.components.cancel-payment', [
                      'payment' => $payment
                    ])
                  @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/checkout-tour.js') }}"></script>
@endpush
