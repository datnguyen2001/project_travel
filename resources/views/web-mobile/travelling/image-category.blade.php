<section class="image-category-section mobile">
    <div class="container">
        <h5 style="font-weight: 600">Hình ảnh khu nghỉ dưỡng</h5>
        <div class="image-content-1" style="margin-bottom: 16px">
            <div class="row image-content-child">
                @foreach($multimedia as $k => $v)
                    @if($k < 2)
                        <div class="col-6 ">
                            <img class="img-w-100 img-travel-small" style="object-fit: cover;width: 168px;"
                                 src="{{$v->src}}" alt="">
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="">
                @foreach($multimedia as $k => $v)
                    @if($k == 2)
                        <img class="img-w-100" style="object-fit: cover" src="{{$v->src}}" alt="">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="image-content-2">
            <div class="image-content-child">
                @foreach($multimedia as $k => $v)
                    @if($k == 3)
                        <img class="img-w-100" style="object-fit: cover" src="{{$v->src}}" alt="">
                    @endif
                @endforeach
            </div>
            <div class="row">
                @foreach($multimedia as $k => $v)
                    @if($k > 3 && $k < 6)
                        <img class="img-w-100" src="{{$v->src}}" style="object-fit: cover;width: 45%" alt="">
                    @elseif($k > 7)
                        <button class="img-booking-small position-absolute border-0 text-white show-slide"
                                value="{{$category_travel->id}}"
                                style="object-fit: cover; background: #7b7b7b80; right: 27px; font-size: 18px;width: calc(100% / 2 - 36px) !important;height: 117px">
                            + {{count($multimedia) - 5}}</button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
