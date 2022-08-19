<section id="support">
{{--    <div class="container-fluid">--}}
    @foreach($support as $key => $value)
        <div class="block-support">
            <img class="image-support" src="{{$value->src}}" alt="">
            <div class="support-detail">
                <img class="logo" src="{{$value->icon}}" alt="">
                <h3 class="location-title">{{$value->title}}</h3>
                <p class="location-desc w-75">{{$value->content}}</p>
                <p class="support-phone">Hotline: {{$value->phone}}</p>
            </div>
        </div>
    @endforeach
{{--    </div>--}}
</section>
