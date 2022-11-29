<section class="row container-block-search">
    <form action="{{url($urlk)}}" method="get" class="col-lg-4 col-md-12 col-sm-12 block-filter mb-2">
        <h1 class="booking-heading">
            Danh sách Tour
        </h1>
        <div class="block-filter-detail">
            <div class="filter-header">
                <h3 class="filter-title">Bộ lọc</h3>
                <a href="{{url($urlk)}}"><h3 class="filter-reset">Xoá tất cả </h3></a>
            </div>
            <div class="filter-range">
                <h3 class="filter-title">Khoảng giá</h3>
                <div style="display: flex;align-items: center">
                    <input type="text" name="price-from" class="inp-price format-currency"  placeholder="Từ">
                    <span style="margin: 0 5px;font-style: normal;font-weight: 400;font-size: 1rem;color: #111827;">=></span>
                    <input type="text" name="price-to" class="inp-price format-currency"  placeholder="Đến">
                </div>


                {{--                <price-range currency="VNĐ">--}}
{{--                    <div>--}}
{{--                        <div>--}}
{{--                            <input--}}
{{--                                name="price-from"--}}
{{--                                type="range"--}}
{{--                                min="0"--}}
{{--                                max="15000000"--}}
{{--                                step="1"--}}
{{--                                value="{{request()->get('price-from') ?? 0}}"--}}
{{--                                aria-label="From"--}}
{{--                            />--}}
{{--                            <input--}}
{{--                                name="price-to"--}}
{{--                                type="range"--}}
{{--                                min="0"--}}
{{--                                max="15000000"--}}
{{--                                step="1"--}}
{{--                                value="{{request()->get('price-to') ?? 15000000}}"--}}
{{--                                aria-label="To"--}}
{{--                            />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <output>--}}
{{--                        output--}}
{{--                    </output>--}}
{{--                </price-range>--}}
            </div>
            <div class="filter-quality">
                <h3 class="filter-title">Chất lượng</h3>
                <div class="block-star">
                    <input class="input-star" @if(isset(request()->star) && in_array(5, request()->get('star'))) checked @endif name="star[]" value="5" type="checkbox">
                    <ul class="list-star">
                        @for($i=0; $i<5; $i++)
                            <li>
                                <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="block-star">
                    <input class="input-star" @if(isset(request()->star) && in_array(4, request()->get('star'))) checked @endif name="star[]" value="4" type="checkbox">
                    <ul class="list-star">
                        @for($i=0; $i<4; $i++)
                            <li>
                                <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="block-star">
                    <input class="input-star" @if(isset(request()->star) && in_array(3, request()->get('star'))) checked @endif name="star[]" value="3" type="checkbox">
                    <ul class="list-star">
                        @for($i=0; $i<3; $i++)
                            <li>
                                <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="block-star">
                    <input class="input-star" @if(isset(request()->star) && in_array(2, request()->get('star'))) checked @endif name="star[]" value="2" type="checkbox">
                    <ul class="list-star">
                        @for($i=0; $i<2; $i++)
                            <li>
                                <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="block-star">
                    <input class="input-star" @if(isset(request()->star) && in_array(1, request()->get('star'))) checked @endif name="star[]" value="1" type="checkbox">
                    <ul class="list-star">
                        @for($i=0; $i<1; $i++)
                            <li>
                                <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
{{--            <div class="filter-distance">--}}
{{--                <h3 class="filter-title">Khoảng cách</h3>--}}
{{--                <div class="condition-item">--}}
{{--                    <input class="input-star" type="checkbox">--}}
{{--                    <div class="condition-desc">Gần đây nhất</div>--}}
{{--                </div>--}}
{{--                <div class="condition-item">--}}
{{--                    <input class="input-star" type="checkbox">--}}
{{--                    <div class="condition-desc"><2 kilomet</div>--}}
{{--                </div>--}}
{{--                <div class="condition-item">--}}
{{--                    <input class="input-star" type="checkbox">--}}
{{--                    <div class="condition-desc"><5 kilomet</div>--}}
{{--                </div>--}}

{{--            </div>--}}
            <div class="mt-5 pb-5">
                <button class="w-100 btn text-white" type="submit" style="background: #0FD200;border-radius: 8px;">Áp dụng</button>
            </div>
        </div>
    </form>
    <div class="col-lg-8 col-md-12 col-sm-12 block-result">
        <form action="{{url($urlk)}}" method="get" class="w-100 position-relative">
            <button class="border-0 p-0 bg-transparent position-absolute" style="top: 50%; left: 20px;transform: translate(-50%, -50%)" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9CA3AF" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            <input class="form-control input-search" name="key_search" style="padding-left: 40px" value="{{request()->get('key_search')}}" type="text" placeholder="Tìm kiếm">
        </form>
        <div class="result-list" id="result-list">
            @include('web.touring.items')
        </div>
    </div>
</section>
