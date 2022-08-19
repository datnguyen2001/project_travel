<section class="category-section mobile" id="category">
    <div class="slider-category-block">
        @foreach($category as $value)
        <div class="slider-category slider-category__item @if(isset($category_hotel) && $category_hotel->id == $value->id) active @endif">
            <a href="{{url('booking/category',$value->slug)}}">
                <div>
                    <img class="img-category-item" src="{{$value->img}}" alt="">
                    <div class="category-name">{{$value->name}}</div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
