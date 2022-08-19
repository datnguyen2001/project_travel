<section class="row container-block-search">
    <h1 class="booking-heading">
        Danh sách nhà nghỉ
    </h1>
    <div class="col-12 block-result">
        <div class="row">
            <div class="col-8 position-relative">
                <form action="{{url($url)}}" method="get" class="w-100 position-relative">
                    <button class="border-0 p-0 bg-transparent position-absolute" style="top: 50%; left: 20px;transform: translate(-50%, -50%)" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9CA3AF" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <input class="form-control input-search" name="key_search" style="padding-left: 40px" value="{{request()->get('key_search')}}" type="text" placeholder="Tìm kiếm">
                </form>
{{--                <input class="form-control input-search" type="search" placeholder="Tìm kiếm">--}}
{{--                <button class="btn-search-mobile"><i class="fa fa-search"></i></button>--}}
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center link-filter">
                <button type="button" class="button-show-modal" data-bs-toggle="modal" data-bs-target="#popup-filter">
                    <img src="{{ asset('images/booking/icon/filter.svg') }}">
                    Bộ lọc
                </button>
            </div>
        </div>

        <div class="result-list">
            @foreach($hotel as $value)
                <div class="mb-3 result-item-mb ">
                    <a href="{{route('web.booking.detail', $value->slug)}}">
                        @if($value->is_video == 1)
                            <video autoplay loop muted class="img-booking w-100" style="object-fit: cover;width: 258px!important;">
                                <source src="{{$value->banner}}">
                            </video>
                        @else
                            <img srcset="{{ $value->banner }} 2x" alt="" class="img-booking w-100" style="object-fit: cover;width: 258px!important;">
                        @endif
                    </a>
                    <div class="room-detail p-3">
                        <div class="footer-review">
                            <a href="{{route('web.booking.detail', $value->slug)}}">
                                <div class="room-title content-drop-1-line">{{$value->name}}</div>
                            </a>
                            <div class="start-block">
                                <i class="fa fa-star" style="color: #FFCF23"></i>
                                <span class="number-rating">{{$value->rating}}</span>
                            </div>
                        </div>
                        <div class="room-address mb-2" >
                            <img src="{{asset('images/booking/icon/location.svg')}}" alt="">
                            <div class="room-address-desc content-drop-1-line" style="font-size: 15px">{{$value->address}}</div>
                        </div>
                        <h3 class="room-price content-drop-1-line mb-2" style="font-size: 15px">{{number_format($value->price)}}đ - {{number_format($value->price_2)}}đ<span class="room-desc">/phòng/đêm</span></h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

