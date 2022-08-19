<section class="category-section mobile" id="category">
    <div class="container">
        <div class="slider-category-block">
            @foreach($category as $k => $value)
                <div class="slider-category slider-category__item @if($value->id == $category_travel->id) is_active @endif" style="width:120px;height: 110px;overflow: hidden;margin-right: 10px">
                    <a href="{{route('web.tour.category', $value->id)}}" class="link-tour">
                        <div style="width: 120px;height: 105px;position: relative;">
                            <img class="img-category-item cate-tour-mb" src="{{$value->banner}}" alt="">
                            <div class="category-name" style="position: absolute;bottom: 10px;left: 50%;transform: translateX(-50%);color: #ff3366!important;">{{$value->title}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
