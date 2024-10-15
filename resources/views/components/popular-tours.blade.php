@if (count($tours) > 0)
<section class="ftco-section ftco-no-pb ftco-room mb-5">
    <div class="container">
        <div class="heading-section text-center ftco-animate">
            <h2 class="mb-4">Popular tours and unique experiences</h2>
        </div>
        <div class="row">
            @foreach($tours as $key => $tour)
                <div class="col-md-3 mb-4">
                    @include('pages.tours.components.card', ['post' => $tour])
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
