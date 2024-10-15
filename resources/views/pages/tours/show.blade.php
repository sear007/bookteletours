@extends('navbar.header')
@section('title', 'Our Rooms/Room Detail')
@section('content')
    @include('components.banner', [
        'title' => $tour->name,
        'subTitle' => $tour->name_other,
        'background' => $tour->photo,
    ]);

    <div class="container container-show-page">
        <div class="row">
            <div class="col-lg-9">
                <div class="bg-white p-3 shadow rounded">
                    <p class="small text-muted mb-2"><i class="mr-2 fa fa-map"></i>{{ $tour->address }}</p>
                    <p class="text-muted mb-2">{{ $tour->short_description }}</p>
                    @include('pages.tours.components.slider', [
                      'photos' => $tour->tourImages,
                      'path' => env('LINK_PATH_SHOW_TOUR_IMAGE'),
                    ])
                    {{-- Design Card Here --}}
                    @foreach ($tour->tourTypes as $item)
                        @include('pages.tours.components.cardV2', [
                            'item' => $item,
                            'branch_id' => $tour->id,
                            'branch_name' => $tour->name,
                        ])
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                @include('pages.branch.layouts.mini-map', [
                    'title' => $tour->name,
                    'long' => $tour->long,
                    'lat' => $tour->lat,
                ])
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
