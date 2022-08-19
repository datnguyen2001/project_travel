<section class="feature">
    <div class="container-fluid">
        <div class="bg-feature">
            <img class="feature-1" src="{{asset('images/introduce/feature-1.png')}}" alt="">
            <img class="feature-2" src="{{asset('images/introduce/feature-2.png')}}" alt="">
            <div class="block-feature">
                <div class="feature-left">
                    @foreach($titlefeaturs as $key => $value)
                        @if($key<3)
                    <div class="feature-detail-left">
                        <div class="feature-desc-left">
                            <b class="feature-title">{{$value->title}}</b>
                            <div class="feature-content">
                               {{$value->content}}
                            </div>
                        </div>
                        <img class="feature-image-left" src="{{$value->src}}" alt="">
                    </div>
                        @endif
                    @endforeach

                </div>
                @foreach($bannerApp as $key => $value)
                <div class="feature-center">
                    <img src="{{$value->src}}" alt="">
                </div>
                @endforeach
                <div class="feature-right">
                    @foreach($titlefeaturs as $key => $value)
                        @if($key>2)
                    <div class="feature-detail-right">
                        <img class="feature-image-right" src="{{$value->src}}" alt="">
                        <div class="feature-desc-right">
                            <b class="feature-title">{{$value->title}}</b>
                            <div class="feature-content">
                                    {{$value->content}}
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
