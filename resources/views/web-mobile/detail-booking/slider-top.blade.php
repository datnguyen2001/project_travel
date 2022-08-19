<div class="slider-container">
    <div class="slider-image__slick">
        @foreach($multimedia as $key => $value)
            @if($key < 4)
                <div class="slider-image__item">
                    <img class="w-100" src="{{$value->src}}" alt="">
                </div>
            @endif
        @endforeach
    </div>
    <div class="slides-numbers">
        <span class="active">01</span> / <span class="total"></span>
    </div>
    <a href="{{route('web.booking.index')}}"><i class="fa fa-arrow-left btn-back"></i></a>
</div>
