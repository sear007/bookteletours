<div class="swiffy-slider mb-3 slider">
    <ul class="slider-container">
        @foreach ($photos as $photo)
            <li>
                <img src="{{$photo}}" style="max-width: 100%;height: auto;">
            </li>
        @endforeach
    </ul>

    <button type="button" class="slider-nav"></button>
    <button type="button" class="slider-nav slider-nav-next"></button>

    <div class="slider-indicators">
        @foreach ($photos as $key => $photo)
            @if ($key == 0)
            <button class="active"></button>
            @else
            <button></button>
            @endif
        @endforeach
    </div>
</div>