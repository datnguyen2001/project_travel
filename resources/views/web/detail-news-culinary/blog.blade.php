<section class="feedback-review-category-section mt-4" id="detail-news-blog">
    <div class="container">
        <h3 class="title-blog">Blog liên quan</h3>
        <div class="row feedback-and-review">
            @for($i = 0; $i < 3; $i++)
                <div class="col-lg-4 col-md-12 col-sm-12 card-review-main card-d-none">
                    <div class="card-review">
                        <a href="">
                            <img class="image-review img-horizontal" src="{{asset('images/detail-news-travel-experience/image-content-5.png')}}"
                                 style="object-fit: cover" alt="">
                        </a>
                        <div class="content-review">
                            <a href="">
                                <div class="title-review content-drop-1-line">Flamingo Dai Lai Resort</div>
                                <div class="detail-review content-drop-2-line">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</div>
                            </a>
                            <div class="footer-review">
                                <span
                                    class="date-review">Ngày đăng: 20/12/2022</span>
                                <div class="rating-block">
                                    <div>
                                        <object class="star-rating" data="{{('images/travelling/icon/star.svg')}}" type=""></object>
                                    </div>
                                    <span class="number-rating">4.5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
