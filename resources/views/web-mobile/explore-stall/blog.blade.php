<section class="blog-section mobile" id="blog-section-mobile">
    <div class="container">
        <div class="blog-container">
            <h5 style="font-weight: 600">Blog theo danh mục</h5>
            <div class="feedback-and-review d-flex" style="overflow: auto!important;">
                @foreach($data_booth as $value)
                    <div style="width: 258px; height: auto; margin-right: 1.5rem">
                        <div class="card-review">
                            <a href="{{route('web.explore-stall.detail', $value->slug)}}">
                                <img class="image-review img-horizontal" src="{{$value->banner}}" alt="" style="width: 258px!important;">
                            </a>
                            <div class="content-review">
                                <a href="{{route('web.explore-stall.detail', $value->slug)}}">
                                    <div class="title-review content-drop-1-line">{{$value->name}}</div>
                                    <div class="detail-review content-drop-2-line" style="height: 42px">{{$value->content}}
                                    </div>
                                </a>
                                <div class="footer-review">
                                    <span class="date-review">Ngày đăng: {{date('d/m/Y', strtotime($value->created_at))}}</span>
                                    <div class="rating-block">
                                        <div>
                                            <object class="star-rating" data="{{('images/travelling/icon/star.svg')}}" type=""></object>
                                        </div>
                                        <span class="number-rating">{{$value->ratings}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
