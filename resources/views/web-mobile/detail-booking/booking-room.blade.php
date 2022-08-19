<div class="block-list-room">
    <h3 class="title">Chọn phòng</h3>
    <div class="list-room">
        @include('web-mobile.detail-booking.room-item')
    </div>
    @if(count($proposal_room))
    <div class="recommend-room" >
        <h3 class="title">Phòng đề xuất</h3>
        <div class="list-recommend-room">
            @foreach($proposal_room as $key => $value)
                <a href="{{route('web.booking.detail',$value->slug)}}">
                    <div class="recommend-room-item">
                        <img class="img-booking" src="{{$value->banner}}"
                             alt="">
                        <div class="recommend-room_info">
                            <div class="title-top" style="justify-content: space-between">
                                <div class="title-recommend content-drop-1-line">{{$value->name}}</div>
                                <div class="rating-recommend">
                                    <object data="{{asset('images/detail-booking/1-star.svg')}}"></object>
                                    <span style="color: black">{{$value->rating}}</span>
                                </div>
                            </div>
                            <div class="recommend-room_address">
                                <object data="{{asset('images/detail-booking/icon-map.svg')}}"></object>
                                <b class="recommend-room_address_info ml-1 address-room">{{$value->address}}</b>
                            </div>
{{--                            <div class="recommend-room_giuong">--}}
{{--                                <object data="{{asset('images/detail-booking/giuong.svg')}}"></object>--}}
{{--                                <b class="recommend-room_address_info ml-1">Nhà nghỉ 1 giường đôi</b>--}}
{{--                            </div>--}}
                            <div class="recommend-room_price content-drop-1-line">
                                {{number_format($value->price)}}đ - {{number_format($value->price_2)}}đ
                            </div>
                            <div class="recommend-room_type">
                                /phòng/đêm
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
