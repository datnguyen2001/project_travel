<section id="connection-2">
    <div class="container-fluid">
        <div class="block-connection-2">
            @foreach($businessContent as $key =>$value)
            <div class="connection-2-main">
                <div class="connection-2-detail">
                    <h3 class="location-title">{{$value->title}}</h3>
                    <p class="location-desc">{{$value->content}}</p>
                    <div class="location-icon">
                        @foreach($businessIcon as $key => $icon)
                        <div class="location-item">
                            <img src="{{$icon->src}}" alt="">
                            <div class="ml-3">
                                <h3 class="guide-card-title">{{$icon->title}}</h3>
                                <p class="m-0">{{$icon->content}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="connection-2-image">
                    <img src="{{$value->src}}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
