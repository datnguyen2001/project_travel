<div class="slide">
    <div class="homeSlider">
        @foreach($banner as $value)
        <div class="slider-wrap position-relative">
            @if($value->type == 1)
                <img src="{{$value->src}}" class="w-100 h-100 position-absolute" style="top: 0;left: 0;z-index: 10;object-fit: cover">
                @else
                <video class="w-100 h-100 position-absolute" autoplay loop muted style="top: 0;left: 0;z-index: 10;object-fit: cover" >
                    <source src="{{$value->src}}">
                </video>
            @endif
            <div class="container" style="z-index: 12">
                <div class="text">
                    <p class="text-top">{{$value->title}}</p>
                    <a href="{{$value->link}}" class="text-bottom">{{$value->content}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="menu-top">
        <div class="container menu-top-wrap" style="padding-right: 0rem;">
            <ul class="menu-top-slider">
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
                        <p>Blog ẩm thực</p>
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
