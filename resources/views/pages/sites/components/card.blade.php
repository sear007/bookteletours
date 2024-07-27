<div class="__card">
    <a href="{{route('site.show', ['site_id'=>$post->id, 'site_name'=>slug($post->name)])}}"></a>
    <div class="img_container">
        <img src="{{$post->feature_image}}"/>
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