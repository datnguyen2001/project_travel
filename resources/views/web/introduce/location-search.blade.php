<section id="travel-guide">
    <div class="container-fluid">
        @foreach($searchSevice as $key =>$value)
        <div class="block-location-search">
            <img class="image-location" src="{{$value->src}}" alt="">
            <div class="location-detail">
                <h3 class="location-title">{{$value->title}}</h3>
                <p class="location-desc">
                {{$value->content}}
                </p>
                <div class="location-rating">
                    <h3 class="guide-card-title">{{$value->location}}</h3>
                    <div class="star"><i class="fa fa-star" style="color: yellow"></i> {{$value->ratings}}</div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
</section>
