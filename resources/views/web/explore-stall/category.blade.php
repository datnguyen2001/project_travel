<section class="category-section" id="category">
    <div class="container">
        <div class="slider-category__slick">
            @foreach ($category as $value)
                <div class="slider-category__item @if(isset($category_booth) && $category_booth->id == $value->id) is_active @endif">
                    <a href="{{route('web.explore-stall.category',$value->id)}}">
                        <div>
                            <img class="img-category-item" src="{{$value->img}}" alt="">
                            <div class="category-name">{{$value->name}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
