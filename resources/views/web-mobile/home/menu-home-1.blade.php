<div class="menu-top-1" style="padding-top: 10px">

    <div class="container">
        <div class="menu-home-1-wrap">
            <div class="tab">
                @foreach($introduce as $key =>$value)
                    <div class="tab-title">
                        {{$value->title}}
                    </div>
                    <a href="{{route('web.news.introduce')}}">
                        <div class="tab-content position-relative" style="padding-top: 80%">
                            <img src="{{$value->img_1}}" class="w-100 position-absolute h-100"
                                 style="top: 0;left: 0;z-index: 10;object-fit: cover">
                            <div class="text position-absolute" style="bottom: 0; left: 0;z-index: 15">

                                <p class="content-drop-2-line"
                                   style="font-size: 12px;line-height: 21px;">{{$value->content}}</p>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="tab">
                @foreach($geographical as $key =>$value)
                    <div class="tab-title">
                        {{$value->title}}
                    </div>
                    <a href="{{route('web.news.geographical-location')}}">
                        <div class="tab-content position-relative" style="padding-top: 80%">
                            <img src="{{$value->img_1}}" class="w-100 position-absolute h-100"
                                 style="top: 0;left: 0;z-index: 10;object-fit: cover">
                            <div class="text position-absolute" style="bottom: 0; left: 0;z-index: 15">

                                <p class="content-drop-2-line"
                                   style="font-size: 12px;line-height: 21px;">{{$value->content}}</p>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="tab">
                @foreach($tradition as $key =>$value)
                    <div class="tab-title">
                        {{$value->title}}
                    </div>
                    <a href="{{route('web.news.tradition')}}">
                        <div class="tab-content position-relative" style="padding-top: 80%">
                            <img src="{{$value->img_1}}" class="w-100 position-absolute h-100"
                                 style="top: 0;left: 0;z-index: 10;object-fit: cover">
                            <div class="text position-absolute" style="bottom: 0; left: 0;z-index: 15">

                                <p class="content-drop-2-line"
                                   style="font-size: 12px;line-height: 21px;">{{$value->content}}</p>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
