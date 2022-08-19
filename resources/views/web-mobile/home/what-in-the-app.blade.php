<section id="what-in-the-app" style="position: relative;">
    <img src="{{asset('/image-mobile/introduce/bg-1.png')}}" style="position:absolute;top:0;left:0" />
    <img src="{{asset('/image-mobile/introduce/bg-2.png')}}" style="position:absolute;top:0;right:0" />
    <img src="{{asset('/image-mobile/introduce/bg-3.png')}}" style="position:absolute;bottom:0;right:0" />
    <img src="{{asset('/image-mobile/introduce/bg-4.png')}}" style="position:absolute;bottom:0;left:0" />
    <div class="container-fluid">
        <div class="block-what-in-the-app" style="position:relative;">
            @foreach($bannerDescription as $key => $data)
            <div class="what-info">
                <h3 class="what-title">{{$data->title}}</h3>
                <div class="what-item">
                    <div class="row">
                        @foreach($appDescription as $key => $value)
                        <div class="col-sm-6 mb-3" style="width: 50%">
                            <div class="text-center">
                                <img class="what-item-image" src="{{$value->src}}" alt="">
                                <h4 class="what-item-title">{{$value->title}}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
