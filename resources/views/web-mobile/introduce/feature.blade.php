<section class="feature">
    <div class="container-fluid">
        <div class="bg-feature">
            <div class="block-feature">
                <div class="row">
                    @foreach($titlefeaturs as $key => $value)
                    <div class="col-6">
                        <div class="feature-detail-mobile feature-detail text-center">
                            <img class="feature-image mb-2" src="{{$value->src}}" alt=""><br>
                            <b class="feature-title mb-2">{{$value->title}}</b>
                            <div class="feature-content content-drop-2-line">
                                {{$value->content}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
