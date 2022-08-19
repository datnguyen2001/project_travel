<section id="what-in-the-app">
    <div class="container-fluid">
        @foreach($bannerDescription as $key => $data)
        <div class="block-what-in-the-app">
            <div class="what-info">
                <h3 class="what-title">{{$data->title}}</h3>
                <h5 class="what-short-desc">{{$data->content}}</h5>
                <div class="what-item">
                    @foreach($appDescription as $key => $value)
                    <div class="what-item-detail">
                        <img class="what-item-image" src="{{$value->src}}" alt="">
                        <div class="what-item-info">
                            <h4 class="what-item-title">{{$value->title}}</h4>
                            <h5 class="what-short-desc">{{$value->content}}</h5>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
                <img class="what-image" src="{{$data->src}}" alt="">
        </div>
        @endforeach
    </div>
</section>
