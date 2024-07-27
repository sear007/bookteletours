@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
    @include('components.banner', [
        'title' => $tourType->tour->name,
        'subTitle' => $tourType->tour->name_other,
        'background' => '',
    ])

    <div class="container container-show-page mt-3">
        <div class="p-3 bg-white shadow">
          <div class="row">
            @include('pages.tours.components.step', ['step'=> 1])
            <div class="col-md-8">
              @include('pages.tours.components.form-checkout', ['tourType'=>$tourType])
            </div>
            <div class="col-md-4">
              @include('pages.tours.components.summary-price', ['tourType'=>$tourType])
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
