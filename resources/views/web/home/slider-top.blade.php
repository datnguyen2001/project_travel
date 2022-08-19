<div class="slide">
    <div class="homeSlider">
    @if(count($banner))
        @foreach($banner as $value)
            <div class="slider-wrap position-relative slider-banner" style="background: #33333330">
                @if($value->type == 1)
                <img src="{{$value->src}}" class="position-absolute w-100 h-100" style="top: 0;left: 0;z-index: 10">
                @else
                    <video autoplay muted loop class="position-absolute w-100 h-100" style="top: 0;left: 0;z-index: 10;object-fit: cover">
                        <source src="{{$value->src}}" type="video/mp4">
                    </video>
                @endif
                <div class="container position-relative" style="z-index: 15">
                    <div class="text">
                        <p class="text-top">{{$value->title}}</p>
                        <a href="{{$value->link}}" target="_blank" class="text-bottom">{{$value->content}}</a>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="slider-wrap" style="background-image: url('{{asset('/images/banner-home/banner-1.png')}}');">
            <div class="container">
                <div class="text">
                    <p class="text-top">Flamingo Đại Lải Resort</p>
                    <p class="text-bottom">Triết lí xanh trong thiết kế biệt thự</p>
                </div>
            </div>
        </div>
    @endif
    </div>
    <div class="menu-top">
        <div class="container menu-top-wrap">
            <ul>
                <li>
                    <a href="{{route('web.booking.index')}}">
                        <img src="{{asset('images/menu-home/menu-top-1.svg')}}">
                        <p>Booking</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('web.travelling')}}">
                        <img src="{{asset('images/menu-home/menu-top-2.svg')}}">
                        <p>Du lịch</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('web.tour')}}">
                        <img src="{{asset('images/menu-home/menu-top-3.svg')}}">
                        <p>Địa điểm du lịch</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('web.culinary')}}">
                        <img src="{{asset('images/menu-home/menu-top-4.svg')}}">
                        <p>Ẩm thực</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{asset('images/menu-home/menu-top-5.svg')}}">
                        <p>Ưu đãi hot</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('web.explore-stall')}}">
                        <img src="{{asset('images/menu-home/menu-top-6.svg')}}">
                        <p>Gian hàng</p>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
