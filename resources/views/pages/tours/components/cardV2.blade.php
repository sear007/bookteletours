<div class="_card mb-3">
  <div style="width: 35%">
    <div class="_card-image" style="height: 100%;max-height:100%; width: 100%">
      <img src='{{env('LINK_PATH_SHOW_TOUR_TYPE_IMAGE')}}{{$item->featureImage->filename}}' alt='' />
    </div>
  </div>
  <div class="_card-detail" style="padding: 10px">
      <div class="_tour_card-detail-header">
          <div class="w-100">
            <div style="line-height: 0" class="mb-3">
              <h5>{{$item->name}}</h5>
              <p class="text-black-50 text-sm mb-0">{{$item->name_kh}}</p>
            </div>
            <div class="icons">
              <i class="fa-solid fa-motorcycle"></i>
              <i class="fa-solid fa-shield"></i>
              <i class="fa-solid fa-helmet-safety"></i>
                <i class="fa-solid fa-user"></i>
            </div>
            @if ($item->short_description)
                <p class="text-black-50">{{ $item->short_description }}</p>
            @endif
          </div>
          <div>
            <h5 class="price">{{price($item->price_solo)}}
              <span>/pax</span>
            </h5>
          </div>
      </div>
      <div class='_card-detail-footer'>
        <a href="{{ route('tour.showTourType', ['tourTypeId' => $item->id]) }}"
          class='btn-detail btn btn-sm btn-primary'>Detail</a>
      <a href="{{ route('tour.showCheckout', ['tourTypeId' => $item->id]) }}"
          class='btn btn-sm btn-primary button-checkout'>Reserve</a>
      </div>
  </div>
</div>
