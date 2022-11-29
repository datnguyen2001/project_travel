@foreach($hotel as $value)
    <div class="mb-3 result-item ">
        <a href="{{route('web.touring.detail', $value->slug)}}">
            @if($value->is_video == 1)
                <video autoplay loop muted class="img-booking" style="object-fit: cover">
                    <source src="{{$value->banner}}">
                </video>
            @else
                <img srcset="{{ $value->banner }} 2x" alt="" class="img-booking" style="object-fit: cover">
            @endif
        </a>
        <div class="room-detail">
            <div class="rateting">
                <a href="{{route('web.touring.detail', $value->slug)}}">
                    <h3 class="room-title content-drop-1-line">{{$value->name}} </h3>
                </a>
                <div class="mr-4">
                    <object class="star-rating" data="{{('images/travelling/icon/star.svg')}}"
                            type=""></object>
                    <span class="number-rating">{{$value->rating}}</span>
                </div>
            </div>
            <div class="room-address mb-2">
                <img src="{{asset('images/booking/icon/location.svg')}}" alt="">
                <div class="room-address-desc text-ellipsis">{{$value->address}}</div>
            </div>
            {{--                    <div class="room-bed mb-2">--}}
            {{--                        <img src="{{asset('images/booking/icon/bed.svg')}}" alt="">--}}
            {{--                        <div class="room-address-desc">Nhà nghỉ 1 giường đôi</div>--}}
            {{--                    </div>--}}
            <h3 class="room-price mb-2">{{number_format($value->price)}}đ - {{number_format($value->price_2)}}đ</h3>
            <p class="room-desc">/tour</p>
        </div>
    </div>
@endforeach
