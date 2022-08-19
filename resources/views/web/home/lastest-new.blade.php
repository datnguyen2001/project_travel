<div id="lastest-new">
    <div class="container">
        <h1>Tin tức mới nhất</h1>
        <div class="row">
            <div class="col-md-6">
                @foreach($latest_news as $key => $value)
                 @if($key == 0)
                    <a href="{{route('web.news.detail',$value->slug)}}" class="d-flex w-100">
                        <div class="new-wrap-big">
                            @if($value->is_video == 1)
                                <video autoplay loop muted class="img-new-horizontal-big" style="object-fit: cover">
                                    <source src="{{$value->src}}">
                                </video>
                                @else
                                <img src="{{$value->src}}" alt="" class="img-new-horizontal-big" />
                            @endif
                            <p class="content-drop-1-line">{{$value->title}}</p>
                        </div>
                    </a>
                @endif
                @endforeach
            </div>
            <div class="col-md-6">
                <div class="row">
                    @foreach($latest_news as $key => $value)
                        @if($key > 0)
                        <div class="col-md-6">
                            <a href="{{route('web.news.detail',$value->slug)}}">
                                <div class="new-wrap-small">
                                    @if($value->is_video == 1)
                                        <video autoplay loop muted class="img-new-horizontal-small" style="object-fit: cover">
                                            <source src="{{$value->src}}">
                                        </video>
                                    @else
                                        <img src="{{$value->src}}" alt="" class="img-new-horizontal-small" />
                                    @endif
                                    <p class="content-drop-2-line">{{$value->title}}</p>
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <a href="{{route('web.news')}}" class="watch-all all-hov" style="margin-bottom: 100px">Xem tất cả</a>
        </div>
    </div>
</div>
