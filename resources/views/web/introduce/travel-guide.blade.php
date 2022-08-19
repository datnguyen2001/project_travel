<section id="travel-guide">
{{--    <div class="container-fluid">--}}
        <div class="block-travel-guide">
            <div class="guide-header">
                <h3 class="guide-title">Cẩm nang du lịch</h3>
                <p class="guide-short-desc">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain.</p>
            </div>
            <div class="guide-main">
                @foreach($travelGuide as $key => $value)
                <div class="guide-card">
                    <img class="image-guide-card" src="{{$value->src}}" alt="">
                    <h5 class="guide-card-title content-drop-1-line">{{$value->title}}</h5>
                    <p class="guide-card-desc">{{$value->content}}</p>
                </div>
                @endforeach

            </div>
        </div>
{{--    </div>--}}
</section>
