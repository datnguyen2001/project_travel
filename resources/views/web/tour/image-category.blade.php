<section class="image-category-section">
    <div class="container">
        <h3>Hình ảnh khu nghỉ dưỡng</h3>
        <div class="row image-category">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="row image-top">
                    @foreach($multimedia as $k => $v)
                        @if($k < 2)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <img class="img-w-100 img-travel-small" style="object-fit: cover;height: 180px" src="{{$v->src}}" alt="">
                        </div>
                        @endif
                    @endforeach
                </div>
                @foreach($multimedia as $k => $v)
                    @if($k == 2)
                        <img class="img-w-100 img-travel-big" style="object-fit: cover" src="{{$v->src}}" alt="">
                    @endif
                @endforeach
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                @foreach($multimedia as $k => $v)
                    @if($k == 3)
                        <img class="image-top img-w-100 img-travel-big" style="object-fit: cover" src="{{$v->src}}" alt="">
                    @endif
                @endforeach

                <div class="row">
                    <div class="d-flex justify-content-between mt-2 position-relative w-100">
                    @foreach($multimedia as $k => $v)
                        @if($k > 3 && $k < 6)
                                <img src="{{$v->src}}" alt="" class="w-100 img-travel-small d-block" style="object-fit: cover;height: 180px; margin-right: 12px;margin-left: 12px">
                            @elseif($k > 6)
                                <button class="img-booking-small position-absolute border-0 text-white show-slide" value="{{$category_travel->id}}" style="border-radius: 4px;object-fit: cover; background: #7b7b7b80; right: 12px;top:0px; font-size: 18px;width: calc(100% / 2 - 23px) !important;height: 180px"> + {{count($multimedia) - 5}}</button>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-slide"></div>
</section>
