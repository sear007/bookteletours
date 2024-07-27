<form action="{{route('site.index')}}" class="filter-section" id="filter_sites_form">
    <input type="hidden" value="{{route('hotel.index')}}" readonly id="filter_hotels_url">
    <input type="hidden" value="{{route('site.index')}}" readonly id="filter_sites_url">
    <input type="hidden" value="{{route('tour.index')}}" readonly id="filter_tours_url">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-map"></i>
            </span>
        </div>
        <input name="province" id="input-popular-destination-value" type="hidden">
        <input name="province_name" autocomplete="off" id="input-popular-destination" type="text" class="form-control" placeholder="Where are you going?">
        <div id="__close-drop-down" class="input-group-append">
            <a href="#" class="close">x</a>
        </div>
        <div id="input-popular-destination__drop" class="__drop-down"></div>
    </div>
    <div class="dropdown">
        <button id="option_filter_by_button" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Visit</button>
        <div class="dropdown-menu" id="option_filter_by_dropwdown">
            <a target="filter_hotels_url" id="option_filter_by_hotels" class="dropdown-item font-weight-bold" href="#"><i class="fa fa-caret-right mr-2"></i> Place to stay</a>
            <a target="filter_sites_url" id="option_filter_by_sites" class="dropdown-item font-weight-bold" href="#"><i class="fa fa-caret-right mr-2"></i> Place to visit</a>
          <a target="filter_tours_url" id="option_filter_by_tours" class="dropdown-item font-weight-bold" href="#"><i class="fa fa-caret-right mr-2"></i> Things to do</a>
        </div>
      </div>
    <button type="submit" class="btn-search">search</button>
</form>	
@push('scripts')
	<script src="{{asset('js/filter.js')}}"></script>
@endpush