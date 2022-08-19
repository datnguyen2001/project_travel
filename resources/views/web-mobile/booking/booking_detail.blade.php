@if(count($travel_articles))
<div class="block-booking-detail">
    <h1 class="booking-heading">
        Blog trải nghiệm dịch vụ tỉnh Vĩnh Phúc
    </h1>
    <div class="feedback-and-review">
        @foreach($travel_articles as $value)
            <div class="card-review-main">
                <div class="card-review">
                    <a href="{{route('web.news.detail', $value->slug)}}">
{{--                        @if($value->is_video == 1)--}}
{{--                            <video autoplay muted loop class="image-review img-horizontal" style="object-fit: cover;width: 258px!important;">--}}
{{--                                <source src="{{$value->banner}}" type="video/mp4">--}}
{{--                            </video>--}}
{{--                        @else--}}
                            <img class="image-review img-horizontal" srcset="{{ $value->src }} 2x" alt="" style="object-fit: cover;width: 258px!important;">
{{--                        @endif--}}
                    </a>
                    <div class="content-review">
                        <a href="{{route('web.news.detail', $value->slug)}}">
                            <div class="title-review content-drop-1-line">{{$value->title}}</div>
                        </a>
                        <div class="detail-review content-drop-2-line" style="height: 48px">{{$value->content}}
                        </div>
                        <div class="footer-review">
                            <span class="date-review">Ngày đăng: {{date('d/m/Y', strtotime($value->created_at))}}</span>
                            <div class="rating-block">
                                <div>
                                    <object class="star-rating" data="{{('images/travelling/icon/star.svg')}}" type=""></object>
                                </div>
                                <span class="number-rating">{{$value->rating}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
