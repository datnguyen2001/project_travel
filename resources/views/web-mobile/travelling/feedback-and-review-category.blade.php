@if(count($articles_review))
<section class="feedback-review-category-section mobile">
    <div class="container">
        <div class="top-title-review-block">
            <h5 style="font-weight: 600">Đánh giá và review</h5>
{{--            <a href="#" class="button-show-more">Xem tất cả</a>--}}
        </div>
        <div class="feedback-and-review d-flex" style="overflow: auto!important;">
            @foreach($articles_review as $value)
                <div style="width: 258px; height: auto; margin-right: 1.5rem">
                    <div class="card-review">
                        <a href="{{route('web.articles.detail', $value->slug)}}">
                            @if($value->is_video == 1)
                                <img class="image-review img-horizontal" src="{{$value->banner}}" style="object-fit: cover;width: 258px!important;" alt="">
                            @else
                                <video autoplay muted loop class="image-review img-horizontal" style="object-fit: cover;width: 258px!important;">
                                    <source src="{{$value->banner}}" type="video/mp4">
                                </video>
                            @endif
                        </a>
                        <div class="content-review">
                            <a href="{{route('web.articles.detail', $value->slug)}}">
                                <div class="title-review content-drop-1-line">{{$value->title}}</div>
                                <div class="detail-review content-drop-2-line">{{$value->content}}
                                </div>
                            </a>
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
</section>
@endif
