<section id="what-in-the-app" class="position-relative">
    <img class="img-bg-1" src="{{asset('image-mobile/introduce/bg-1.png')}}">
    <img class="img-bg-2" src="{{asset('image-mobile/introduce/bg-2.png')}}">
    <img class="img-bg-3" src="{{asset('image-mobile/introduce/bg-3.png')}}">
    <img class="img-bg-4" src="{{asset('image-mobile/introduce/bg-4.png')}}">
    <div class="container-fluid">
        <div class="block-what-in-the-app">
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
