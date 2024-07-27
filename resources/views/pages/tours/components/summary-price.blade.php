<div class="card h-100">
    <div class="card-header p-2 bg-primary">
        <h6 class="card-title mb-0 font-weight-bold text-dark">
            Your Summary Price
        </h6>
    </div>
    <div class="card-body p-2">
        <div class="d-flex justify-content-between flex-column h-100">
            <div>
                <div class="media mb-2 bg-light border">
                    <img src="{{env('LINK_PATH_SHOW_TOUR_TYPE_IMAGE')}}{{ $tourType->featureImage->filename }}" width="64px" height="64px" class="mr-3">
                    <div class="media-body p-0">
                        <div class="d-flex flex-column">
                            <p class="text-dark font-weight-bold mb-0">{{ $tourType->name }}</p>
                            <a href="{{ route('tour.show', [$tourType->tour->id]) }}"
                                class="small font-weight-bold">Change your selection</a>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <p class="text-muted mb-0">Date:</p>
                    <p id="date_tour" class="text-dark font-weight-bold mb-0"></p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="text-muted mb-0">Time:</p>
                    <p id="time_tour" class="text-dark font-weight-bold mb-0"></p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="text-muted mb-0">Price Solo:</p>
                    <p id="price_solo_tour" class="text-dark font-weight-bold mb-0"></p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="text-muted mb-0">Price Group:</p>
                  <p id="price_group_tour" class="text-dark font-weight-bold mb-0"></p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center border-top border-primary">
                <h6 class="text-muted">Total</h6>
                <h6 id="price_tour" class="font-weight-bold text-primary h3"></h6>
            </div>
        </div>
    </div>
</div>
