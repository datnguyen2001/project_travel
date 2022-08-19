<section class="category-section" id="category">
    <div class="container">
        <div class="slider-category__slick">
            @foreach($category as $k => $value)
                <div class="slider-category__item @if($value->id == $category_travel->id) is_active @endif" style="width:233px;height: 128px;overflow: hidden">
                    <a href="{{route('web.tour.category', $value->id)}}" class="link-tour">
                        <div style="width: 233px;height: 124px;position: relative;">
                            <img class="img-category-item cate-tour" src="{{$value->banner}}" alt="">
                            <div class="category-name title-location" >{{$value->title}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
