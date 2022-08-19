<section class="category-section" id="category">
    <div class="container">
        <div class="slider-category__slick">
            @foreach($category as $k => $value)
                <div class="slider-category__item @if($value->id == $category_travel->id) is_active @endif">
                    <a href="{{route('web.travelling.category', $value->id)}}">
                        <div>
                            <img class="img-category-item" src="{{$value->banner}}" alt="">
                            <div class="category-name">{{$value->title}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
