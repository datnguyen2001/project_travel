<div class="menu-top-1" style="padding-top: 100px">
    <div class="container">
        <div class="tour">
            <h2>Địa điểm du lịch hot</h2>
            <div class="gallery">
                @foreach($category as $k => $value)
                    <div class="clipped-border">
                        <a href="{{route('web.tour.category', $value->id)}}">
                            <img
                                src="{{$value->banner}}"
                                id="clipped" class="img-clipped" style="object-fit: cover">
                            <div class="title-tour" style="color: #ff3366;font-weight: 600;">{{$value->title}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
