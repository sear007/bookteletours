@extends('navbar.header')
@section('title', 'Our Rooms/Room Detail')

@section('content')
    @include('components.banner', [
        'title' => $room->branch->name,
        'subTitle' => $room->name,
        'background' => '',
    ]);
    <div class="container container-show-page mt-3">
    <div class="p-3 bg-white shadow rounded">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @include('pages.branch.layouts.slider', ['photos' => $room->photos])
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex align-items-center">
                            <a href="{{route('hotel.show', [$room->branch->id, $room->branch->name])}}"><i class="fa fa-chevron-left fa-2x mr-3"></i></a>
                            <div class="d-block">
                                <p class="h3 text-muted mb-0">{{$room->branch->name}}</p>
                                <h5 class="text-primary font-weight-bold">{{$room->name}}</h5>
                            </div>
                        </div>
                        <p class="small text-muted mb-2"><i class="mr-2 fa fa-map"></i>{{$room->branch->address}}</p>
                    </div>
                    <div>
                        <h2 class="text-primary font-weight-bold mb-0">{{price($room->price)}} / night</h2>
                        <a href="{{route('checkout.index', ['hotel_id' => $room->branch->id, 'room_id' => $room->id])}}" class="btn btn-sm btn-primary text-dark w-100 font-weight-bold">Book Now</a>
                    </div>
                </div>
                <div class="bg-light border p-2">
                    @if ($room->description)
                        <h5>Description</h5>
                        <pre>{{$room->description}}</pre>
                    @endif
                    @if ($room->remark)
                        <h5>Remark</h5>
                        <pre>{{$room->remark}}</pre>
                    @endif
                    @if ($room->term_condition)
                        <h5>Terms and conditions</h5>
                        <pre>{{$room->term_condition}}</pre>
                    @endif
                    @if ($room->room_facilities)
                        <h5>Room Facilities</h5>
                        <pre>{{$room->room_facilities}}</pre>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                @include('pages.branch.layouts.mini-map', ['title'=> $room->branch->name, 'long'=> $room->branch->long,'lat'=> $room->branch->lat])
            </div>
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
