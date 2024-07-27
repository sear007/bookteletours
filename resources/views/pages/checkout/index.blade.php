@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
@include('components.banner', [
    'title' => $room->branch->name,
    'subTitle' => $room->branch->name_other,
    'background' => '',
])
<div class="container container-show-page mt-3">
    <div class="p-3 bg-white shadow">
        <div>
            @include('pages.checkout.stepper', ['step'])
            @if(request('status') === 'approved')
            @include('pages.checkout.success');
            @elseif (request('hotel_id') && request('room_id') && request('tran_id'))
            @include('pages.checkout.payment')
            @elseif(request('hotel_id') && request('room_id'))
            @include('pages.checkout.checkout', ['room'])
            @elseif(request('hotel_id'))
            @include('pages.checkout.selection', ['room'])
            @else
            @include('pages.checkout.not_found')
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/checkout.js')}}"></script>
@endpush