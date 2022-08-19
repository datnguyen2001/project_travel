@if(count($room_hotel))
    @foreach($room_hotel as $value)
<div class="room-item bg-white">
    <div class="room-image">
        @if($value->is_video == 1)
            <video src="{{$value->banner}}" autoplay loop muted class="img-booking-big">
                <source src="{{$value->banner}}">
            </video>
        @else
            <img src="{{$value->banner}}" alt="" class="img-booking-big" style="object-fit: cover">
        @endif
        <div class="d-flex justify-content-between mt-2 position-relative" style="overflow: auto;width: 100%!important;">
            @foreach($value->multimedia as $key => $item)
                @if($key < 3)
                    <img src="{{$item->src}}" alt="" class="img-booking-small" style="border-radius: 4px;object-fit: cover; width: calc(100% / 3 - 8px) !important;">
                @elseif($key < 4)
                    <button class="img-booking-small position-absolute border-0 text-white show-slide" value="{{$value->id}}" data-value="4" style="border-radius: 4px;object-fit: cover; background: #0FD20080; right: 0;font-size: 18px;width: calc(100% / 3 - 8px) !important;"> + {{count($value->multimedia) - 2}}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="room-detail">
        <div class="room-detail__info">
            <h3 class="room-name content-drop-1-line">{{$value->name}}</h3>
            <h3 class="room-price">{{number_format($value->price)}}đ - {{number_format($value->price_2)}}đ<span class="room-type">(phòng/đêm)</span></h3>
            <div class="mt-3">
                <button class="btn btn-success btn-booking" value="{{$value->id}}">Đặt phòng</button>
            </div>
        </div>
        <div class="room-detail__other-info">
            <div class="other-info">
                <div class="w-100 d-flex flex-wrap justify-content-between align-items-center" style="height: 150px">
                    @if(count($value->convenient))
                        @foreach($value->convenient as $key =>$item)
                            <div class="d-flex align-items-center mb-3" style="width: calc(50%);">
                                @if($key < 5)
                                <img class="mr-2" style="width: 22px!important;height: 22px!important;" src="{{$item->icon_convenient}}" alt="">
                                <span class="other-info__title">{{$item->name_convenient}}</span>
                                @elseif($key < 6)
                                    <button
                                        class="img-booking-small position-absolute border-0 text-white show-utilities"
                                        value="{{$value->id}}"
                                        style="border-radius: 50%;object-fit: cover; background: #ccf0fd; font-size: 18px;width: 60px !important;height: 60px;color: #00b6f3!important;right: 100px">
                                        +{{count($value->convenient) - 5}}</button>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach
@endif
