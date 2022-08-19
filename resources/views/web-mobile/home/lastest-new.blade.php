<div id="lastest-new" style="padding-bottom: 2rem; margin-top: 30px">
    <div class="container">
        <h1 class="mb-3">Tin tức mới nhất</h1>
        <div class="row">
            @foreach($latest_news as $value)
            <div class="col-md-6">
                <a href="{{route('web.news.detail',$value->slug)}}">
                    <div class="new-wrap-big">
                        @if($value->is_video == 1)
                            <video autoplay loop muted class="img-new-horizontal-big" style="object-fit: cover">
                                <source src="{{$value->src}}">
                            </video>
                        @else
                            <img src="{{$value->src}}" alt="" class="img-new-horizontal-big" />
                        @endif
                        <p class="content-drop-2-line">{{$value->title}}</p>
                    </div>
                </a>
            </div>
            @endforeach
            <a href="{{route('web.news')}}" class="watch-all" style="margin-bottom: 100px">Xem tất cả</a>
        </div>
    </div>
</div>
