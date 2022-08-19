<section class="blog-section" id="blog">
    <div class="container">
        <div class="blog-container pb-3">
            <h3>Tất cả sản phẩm</h3>
            <div class="row feedback-and-review">
                @foreach($data_booth as $value)
                    <div class="col-lg-3 col-md-12 col-sm-12 card-review-main card-d-none">
                        <div class="w-100">
                            <div class="img-wrap">
                                <a href="{{route('web.explore-stall.detail',$value->slug)}}">
                                    @if($value->video_active == 1)
                                        <video autoplay muted loop class="img-vertical w-100" style="object-fit: cover">
                                            <source src="{{$value->banner}}" type="video/mp4">
                                        </video>
                                    @else
                                        <img class="img-vertical w-100" src="{{ $value->banner }}" style="object-fit: cover"/>
                                    @endif
                                </a>
                                <a href="{{route('web.explore-stall.detail', $value->slug)}}">
                                    <div class="desc">
                                        <div class="rating-block">
                                            <div class="title title-review content-drop-1-line" style="color: white">{{$value->name}}</div>
                                            <div class="rating-block">
                                                <div>
                                                    <object class="star-rating"
                                                            data="{{('images/travelling/icon/star.svg')}}"
                                                            type=""></object>
                                                </div>
                                                <span class="number-rating-white">{{$value->ratings}}</span>
                                            </div>
                                        </div>
                                        <div class="address d-flex">
                                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                    fill="white"/>
                                            </svg>
                                            <span class="title-review content-drop-1-line" style="display: -webkit-box!important;margin-left: 5px;color: white">{{$value->address}}</span>
                                        </div>
                                        <div class="name">
                                            <p class="title-review content-drop-1-line" style="color: white">{{number_format($value->price)}}đ-{{number_format($value->price_2)}}đ</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$data_booth->render('paginate')}}
        </div>
    </div>
</section>
