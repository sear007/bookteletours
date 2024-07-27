<div class="__card">
    <a href="{{route('tour.show', ['tourId'=>$post->id])}}"></a>
    <div class="img_container">
        <img src="{{env('LINK_PATH_SHOW_TOUR_IMAGE')}}{{$post->featureImage->filename}}"/>
    </div>
    <div class="info_container">
        <div class="box-info">
            <span class="name">{{$post->name}}</span>
            <span class="short_desc">{{Str::limit($post->short_description, 100, '...')}}<span>
        </div>
        <div class="card-reviews">
            <span>{{$post->location->name}}</span>
        </div>
    </div>
</div>