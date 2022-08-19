@if(count($articles_review))
<section class="feedback-review-category-section mt-4">
    <div class="container">
        <h3>Đánh giá và review</h3>
        <div class="row feedback-and-review">
            @foreach($articles_review as $value)
                <div class="col-lg-4 col-md-12 col-sm-12 card-review-main card-d-none">
                    <div class="card-review">
                        <a href="{{route('web.articles.detail', $value->slug)}}">
                            @if($value->is_video == 1)
                                <img class="image-review img-horizontal" src="{{$value->banner}}" style="object-fit: cover" alt="">
                                @else
                                <video autoplay muted loop class="image-review img-horizontal" style="object-fit: cover">
                                    <source src="{{$value->banner}}" type="video/mp4">
                                </video>
                            @endif
                        </a>
                        <div class="content-review">
                            <a href="{{route('web.articles.detail', $value->slug)}}">
                                <div class="title-review content-drop-1-line" style="display: -webkit-box!important;">{{$value->title}}</div>
                                <div class="detail-review content-drop-2-line">{{$value->content}}</div>
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
{{--        <div class="load-more-button">--}}
{{--            <button type="button" class="btn btn-view-all">Xem tất cả</button>--}}
{{--        </div>--}}
    </div>
</section>
@endif
