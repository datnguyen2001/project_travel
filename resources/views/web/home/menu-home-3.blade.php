<section id="what-in-the-app">
    <img src="{{asset('images/menu-home/bg-1.png')}}" alt="" class="bg-1"/>
    <img src="{{asset('images/menu-home/bg-2.png')}}" alt="" class="bg-2" />
    <img src="{{asset('images/menu-home/bg-3.png')}}" alt="" class="bg-3" />
    <img src="{{asset('images/menu-home/bg-4.png')}}" alt="" class="bg-4" />
    <div class="container">
        @foreach($bannerDescription as $key => $data)
        <div class="block-what-in-the-app">
            <div class="what-info">
                <h3 class="what-title">{{$data->title}}</h3>
                <h5 class="what-short-desc content-drop-2-line">{{$data->content}}</h5>
                <div class="what-item">
                    @foreach($appDescription as $key => $value)
                    <div class="what-item-detail">
                        <img class="what-item-image" src="{{$value->src}}" alt="">
                        <div class="what-item-info">
                            <h4 class="what-item-title">{{$value->title}}</h4>
                            <h5 class="what-short-desc content-drop-2-line">{{$value->content}}</h5>
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
