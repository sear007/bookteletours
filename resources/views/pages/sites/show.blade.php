@extends('navbar.header')
@section('title', 'Our Rooms/Room Detail')
@section('content')
@include('components.banner', [
    'title' => $site->name,
    'subTitle' => $site->name_other,
    'background' => $site->feature_image,
]);
<div class="container container-show-page">
    <div class="row">
        <div class="col-lg-9">
            <div class="bg-white p-3 shadow rounded">
                <p class="small text-muted mb-2"><i class="mr-2 fa fa-map"></i>{{$site->address}}</p>
                <p class="text-muted mb-2">{{$site->short_description}}</p>
                @include('pages.branch.layouts.slider', ['photos' => [...[$site->feature_image], ...$site->photos]])
            </div>
        </div>
        <div class="col-lg-3">
            @include('pages.branch.layouts.mini-map', ['title'=> $site->name, 'long'=> $site->long,'lat'=> $site->lat])
        </div>
    </div>
</div>
@push('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="{{asset('branch/css/show-branch.css')}}" rel="stylesheet">
@endpush
@push('scripts')
<script src="{{asset('js/google-map.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
@endpush
@endsection