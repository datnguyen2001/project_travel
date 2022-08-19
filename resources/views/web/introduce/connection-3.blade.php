<section id="connection-3">
{{--    <div class="container-fluid">--}}
        <div class="block-connection-3">
            <div class="connection-3-header">
                <h3>Công nghệ chuyển đổi số khiến cho chuyến đi của bạn chưa
                    bao giờ lại dễ dàng đến vậy</h3>
            </div>
            <div class="connection-3-main">
                @foreach($technology as $key => $value)
                <div class="card-cn-3" style="width: 33%">
                    <img class="mb-3" src="{{$value->src}}" alt="">
                    <h3 class="guide-card-title content-drop-1-line">{{$value->title}}</h3>
                    <p class="guide-card-desc">{{$value->content}}</p>
                </div>
                @endforeach
            </div>
        </div>
{{--    </div>--}}
</section>
