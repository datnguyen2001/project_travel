<section id="connection">
    <div class="container-fluid">
        @foreach($superApp as $key => $value)
        <div class="block-connection" style="padding: 0!important;">
            <div style=" position: relative;">
                <div style="width:100%; height: 400px;">
                    <img class="connection-image" src="{{$value->img_1}}" alt="" style="width: 200px;height: 200px;border-radius: 50%;object-fit: cover;position: absolute;right:0;top: 0">
                    <img class="connection-image" src="{{$value->img_2}}" alt="" style="width: 140px;height: 140px;border-radius: 50%;object-fit: cover; position: absolute; left: 60px;top: 29%">
                    <img class="connection-image" src="{{$value->img_3}}" alt="" style="width: 170px;height: 170px;border-radius: 50%;object-fit: cover; position: absolute; left: -80px;bottom: 0">
                </div>
            </div>
            <div class="connection-detail">
                <p class="connection-title">{{$value->title}}</p>
                <p class="connection-desc">{{$value->content}}</p>
                <div class="connection-info">
                    <div class="row">
                        <div class="col-sm-4">
                            <b class="title-info">{{$value->Explores}}</b>
                            <p>Our Explores</p>
                        </div>
                        <div class="col-sm-4">
                            <b class="title-info">{{$value->Destinations}}</b>
                            <p>Destinations</p>
                        </div>
                        <div class="col-sm-4">
                            <b class="title-info">{{$value->Experience}}</b>
                            <p>Year Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
