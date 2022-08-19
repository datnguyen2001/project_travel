<section id="connection">
    <div class="container-fluid" style="height: 450px">
        @foreach($superApp as $key => $value)
        <div class="block-connection">
            <div style="width: 400px; height: 200px; position: relative;">
                <div style="width:200px; height: 200px;">
                    <img class="" src="{{$value->img_1}}" alt="" style="width: 220px;height: 220px;border-radius: 50%;object-fit: cover;position: absolute;left: 0">
                    <img class="" src="{{$value->img_2}}" alt="" style="width: 140px;height: 140px;border-radius: 50%;object-fit: cover; position: absolute; right: 0;top: 50%">
                    <img class="" src="{{$value->img_3}}" alt="" style="width: 170px;height: 170px;border-radius: 50%;object-fit: cover; position: absolute; left: 30%;top: 225px">
                </div>
            </div>

            <div class="connection-detail" style="margin-top: 80px;margin-left: 30px; width: 780px">
                <b class="connection-title">{{$value->title}}</b>
                <p class="connection-desc">{{$value->content}}</p>
                <div class="connection-info">
                    <div class="info-1">
                        <b class="title-info">{{$value->Explores}}</b>
                        <p>Our Explores</p>
                    </div>
                    <div class="info-1">
                        <b class="title-info">{{$value->Destinations}}</b>
                        <p>Destinations</p>
                    </div>
                    <div class="info-1">
                        <b class="title-info">{{$value->Experience}}</b>
                        <p>Year Experience</p>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
</section>
