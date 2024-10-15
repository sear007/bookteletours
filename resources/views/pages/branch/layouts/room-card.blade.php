<div x-data="reservation" class='_card mb-3'>
    <div class='_card-image'>
        <img src='{{$room->feature_image}}' alt='' />
    </div>
    <div class='_card-detail'>
        <div class='_card-detail-header'>
            <h1>{{$room->name}}</h1>
            <h5 class='price'>{{price($room->price)}}<span>/Night</span</h5>
        </div>

        <div class='_card-detail-body'>
            <div class="icons">
                <i class='fa fa-user'></i>
                <i class='fa fa-bed'></i>
                <i class="fa fa-bath"></i>
                <i class="fa-solid fa-car"></i>
            </div>
            @if ($room->short_description)
                <p>{{$room->short_description}}</p>
            @endif
        </div>

        <div class='_card-detail-footer'>
            <a  href="{{route('hotel.show.room',[$branch_id, slug($branch_name), $room->id, slug($room->name)])}}" class='btn-detail btn btn-sm btn-primary'>Detail</a>
            <a href="{{route('checkout.index', ['hotel_id' => $branch_id, 'room_id' => $room->id])}}" class='btn btn-sm btn-primary button-checkout'>Reserve</a>
        </div>
    </div>
</div>