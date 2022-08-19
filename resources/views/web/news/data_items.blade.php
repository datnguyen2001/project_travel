<div class="row feedback-and-review">
    @foreach($featured_news as $value)
        <div class="col-lg-4 col-md-12 col-sm-12 card-review-main">
            <div class="card-review">
                <a href="{{route('web.news.detail', $value->slug)}}" class="d-flex w-100 position-relative" style="padding-top: 70%">
{{--                    @if($value->is_video == 1)--}}
{{--                        <video loop autoplay muted class="image-review position-absolute h-100" style="top: 0;left: 0;object-fit: cover">--}}
{{--                            <source src="{{$value->src}}" type="video/mp4">--}}
{{--                        </video>--}}
{{--                    @else--}}
                        <img class="image-review position-absolute h-100" style="top: 0;left: 0;object-fit: cover" srcset="{{ $value->src }} 2x" alt="">
{{--                    @endif--}}
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
{{ $featured_news->render('paginate') }}
