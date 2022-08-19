@if(count($travel_articles))
<div class="block-booking-detail">
    <h3>Blog trải nghiệm dịch vụ tỉnh Vĩnh Phúc</h3>
    <div class="row feedback-and-review">
        @foreach($travel_articles as $value)
            <div class="col-lg-4 col-md-12 col-sm-12 card-review-main card-d-none">
                <div class="card-review">
                    <a href="{{route('web.news.detail', $value->slug)}}">
{{--                        @if($value->is_video == 1)--}}
{{--                            <video autoplay muted loop class="image-review img-horizontal" style="object-fit: cover">--}}
{{--                                <source src="{{$value->banner}}" type="video/mp4">--}}
{{--                            </video>--}}
{{--                            @else--}}
                            <img class="image-review img-horizontal" srcset="{{ $value->src }} 2x" alt="" style="object-fit: cover">
{{--                        @endif--}}
                    </a>
                    <div class="content-review">
                        <a href="{{route('web.news.detail', $value->slug)}}">
                            <div class="title-review content-drop-1-line" style="display: -webkit-box!important;">{{$value->title}}</div>
                        </a>
                        <div class="detail-review content-drop-2-line" style="height: 48px">{{$value->content}}</div>
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
{{--    <div class="load-more-button">--}}
{{--        <button type="button" class="btn btn-view-all">Xem tất cả</button>--}}
{{--    </div>--}}
</div>
@endif
