@extends('navbar.header')
@section('title', 'Our Tour Service')
@section('content')
    @include('components.banner', [
        'title' => $tourType->tour->name,
        'subTitle' => $tourType->tour->name_other,
        'background' => '',
    ]);
    <div class="container container-show-page mt-3">
        <div class="p-3 bg-white shadow rounded">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    @include('pages.tours.components.slider', [
                        'photos' => $tourType->tourTypeImages,
                        'path' => env('LINK_PATH_SHOW_TOUR_TYPE_IMAGE'),
                    ])
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex align-items-start">
                                <div style="display: flex; flex-direction: column;">
                                    <p class="h3 text-primary mb-0">
                                        <a href="{{ route('tour.show', [$tourType->tour->id]) }}">
                                            {{ $tourType->tour->name }}<br>
                                            {{ $tourType->tour->name_other }}
                                        </a>
                                    </p>
                                    <div style="line-height: 0" class="mb-3">
                                        <p class="text-primary font-weight-bold h5 mb-0">{{ $tourType->name }}</p>
                                        <p class="text-secondary font-weight-bold h6 mb-0">{{ $tourType->name_kh }}</p>
                                    </div>
                                </div>
                            </div>
                            <p class="small text-muted mb-2"><i class="mr-2 fa fa-map"></i>{{ $tourType->tour->address }}
                            </p>
                        </div>
                        <div>
                            <h4 class="text-primary font-weight-bold mb-0">{{ price($tourType->price_solo) }}/<sub>pax</sub> </h2>
                            <h4 class="text-primary font-weight-bold mb-2">{{ price($tourType->price_group) }}/<sub>pax</sub></h2>
                            <a href="{{ route('tour.showCheckout', [$tourType->id]) }}"
                                class="btn btn-sm btn-primary text-dark w-100 font-weight-bold">Book Now</a>
                        </div>
                    </div>

                    <div class="bg-light border p-2">
                        @if ($tourType->description)
                            <h5>Description</h5>
                            <pre>{{ $tourType->description }}</pre>
                        @endif
                        @if ($tourType->term_condition)
                            <h5>Terms and conditions</h5>
                            <pre>{{ $tourType->term_condition }}</pre>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    @include('pages.branch.layouts.mini-map', [
                        'title' => $tourType->tour->name,
                        'long' => $tourType->tour->long,
                        'lat' => $tourType->tour->lat,
                    ])
                </div>
            </div>
        </div>
    </div>

    @push('stylesheet')
        <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet"
            crossorigin="anonymous">
        <link href="{{ asset('branch/css/show-branch.css') }}" rel="stylesheet">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/google-map.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
            defer></script>
    @endpush

@endsection
