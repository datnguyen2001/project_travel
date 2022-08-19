@if(count($articles_review))
<div class="block-blog">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="booking-heading">
            Đánh giá và review
        </h1>
        <a href="#" class="button-show-more">Xem tất cả</a>
    </div>
    <div class="feedback-and-review">
        @foreach($articles_review as $value)
            <div class="card-review-main">
                <div class="card-review">
                    <a href="{{route('web.articles.detail', $value->slug)}}">
                        @if($value->is_video == 1)
                            <img class="image-review img-horizontal" srcset="{{ $value->banner }} 2x" style="object-fit: cover;width: 258px!important;" alt="">
                        @else
                            <video autoplay muted loop class="image-review img-horizontal" style="object-fit: cover;width: 258px!important;">
                                <source src="{{$value->banner}}" type="video/mp4">
                            </video>
                        @endif
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
                                    <object class="star-rating" data="{{('images/travelling/icon/star.svg')}}"
                                            type=""></object>
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
