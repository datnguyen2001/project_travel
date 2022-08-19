@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Trang chủ - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css',['slick'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/detail-culinary/detail-culinary.css')}}">
    <link rel="stylesheet" href="{{asset('dist/web-mobile/detail-culinary/detail-culinary.css')}}">
    <style>
        .popup-form, .popup-slide {
            top: 100%;
            left: 0;
            opacity: 0;
            z-index: -100;
            transition: .5s;
            background: #33333380;
        }
        .popup-slide.active {
            top: 0;
            opacity: 1;
            z-index: 10000;
        }
        .slide-room{
            height: 330px !important;
            width: 380px!important;
        }
    </style>
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <section id="detail-culinary" class="mobile">
        <div class="container">
            <div class="block-detail-culinary">
                <h5 class="top-title">{{$culinary->name}}</h5>
                <div class="short-desc">
                    {{$culinary->content}}
                </div>
                <div class="culinary-information">
                    <div class="detail-left">
                        <div class="list-image position-relative" style="padding-top: 60%;margin-bottom: 0px">
{{--                            @if($culinary->video_active == 1)--}}
{{--                                <video autoplay muted loop controls--}}
{{--                                       class="image-main img-culinary-big w-100 d-block position-absolute h-100"--}}
{{--                                       style="top: 0; left: 0;object-fit: cover">--}}
{{--                                    <source src="{{$culinary->banner}}" type="video/mp4">--}}
{{--                                </video>--}}
{{--                            @else--}}
                                <img src="{{$culinary->src}}"
                                     class="image-main img-culinary-big w-100 d-block position-absolute h-100"
                                     style="top: 0; left: 0;object-fit: cover" alt="">
{{--                            @endif--}}

                        </div>
                        <div class="row image-extra" style="margin: 0;height: 80px">
                            @foreach($multimedia as $key => $value)
                                <div class="col-3 img-child" style="padding-left: 5px;padding-right: 5px">
                                    <div class="w-100 position-relative" style="padding-top: 70%">
                                        @if($key < 4)
                                            <img src="{{$value->src}}"
                                                 class="image-extra img-culinary-small w-100 d-block position-absolute h-100"
                                                 alt="" style="object-fit: cover;top: 0;left: 0;height: 80px!important;">
                                        @elseif($key < 5)
                                            <button
                                                class="img-booking-small position-absolute border-0 text-white show-slide"
                                                value="{{$culinary->id}}"
                                                style="object-fit: cover; background: #7b7b7b80; right: -271px;top:-56px; font-size: 18px;width: calc(100% / 2 + 40px) !important;height: 80px">
                                                + {{count($multimedia) - 4}}</button>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="content-detail" style="margin-top: -15px">
                    <div class="long-desc mt-5">{!! $culinary->description !!}</div>
                    <div class="content-4">
                        @if(isset($culinary->video_review))
                            <h5>Video review về món {{$culinary->name}}</h5>
                            <div class="list-image position-relative" style="padding-top: 50%">
                                <video autoplay muted loop controls
                                       class="image-main img-culinary-big w-100 d-block position-absolute h-100"
                                       style="top: 0; left: 0;object-fit: cover">
                                    <source src="{{$culinary->video_review}}" type="video/mp4">
                                </video>
                            </div>
                        @endif
                        @if(isset($culinary->menu))
                            <h5>Bảng giá và ưu đãi hấp dẫn của {{$culinary->name}}</h5>
                            <div class="long-desc mt-5 mt-3">{!! $culinary->menu !!}</div>
                        @endif
                    </div>
                    {{--                    <div class="content-5">--}}
                    {{--                        <h5>5. Bảng giá và ưu đãi hấp dẫn của Lòng “Chát” Tôn Thất Tùng</h5>--}}
                    {{--                        <div>--}}
                    {{--                            <div class="mt-3">--}}
                    {{--                                <div>Menu món luộc: từ 15.000 VNĐ</div>--}}
                    {{--                                <div>Menu khai vị: từ 40.000 VNĐ</div>--}}
                    {{--                                <div>Menu món chiên xào: từ 80.000 VNĐ</div>--}}
                    {{--                                <div>Menu lẩu lòng: từ 275.000 VNĐ</div>--}}
                    {{--                                <div>Menu đồ uống: từ 5.000 VNĐ</div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mt-3">--}}
                    {{--                                Tuy menu giá hơi cao so với những quán bình dân, song nếu đã thưởng thức 1 lần thì bạn--}}
                    {{--                                sẽ thấy đúng với câu “chất lượng tương xứng với giá tiền”. Tất cả các khâu từ lúc chọn--}}
                    {{--                                nguyên liệu đến khi lên món ăn đều được thực hiện vô cùng cẩn thận và tỉ mỉ. Chính vì--}}
                    {{--                                thế mà bạn hoàn toàn an tâm khi đến đây.--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>

                <div class="list-store">
                    <h5>Danh sách quán có món ăn này</h5>
                    <div class="store-block">
                        @foreach($restaurant_culinary as $value)
                            @if(isset($value->restaurant))
                                <div class="address-item" style="width: 360px">
                                    @if($value->restaurant->type == 1)
                                        <img class="img-address-item" src="{{$value->restaurant->banner}}" alt=""
                                             style="object-fit: cover">
                                    @else
                                        <video muted loop autoplay class="img-address-item"
                                               style="width: 82px; height: 82px;object-fit: cover">
                                            <source src="{{$value->restaurant->banner}}">
                                        </video>
                                    @endif
                                    <div class="address-detail detail-store" style="width: calc(100% - 82px)">
                                        <div class="address-title text-ellipsis">{{$value->restaurant->name}}</div>
                                        <div class="address-map text-ellipsis">
                                            <img class="mr-1" src="{{asset('images/detail-culinary/map.svg')}}" alt="">
                                            <span>{{$value->restaurant->address}}</span>
                                        </div>
                                        <a href="{{"https://maps.google.com?q=".$value->restaurant->map}}"
                                           target="_blank" class="add-view-map view-map">Chỉ đường <i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="address-main">
                    <h5 class="top-title">Địa chỉ quán gần bạn nhất</h5>
                    <div class="w-100 map">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDX1GYdRZFd5R588gS3r4L6t5QB9ehJ-jU&q=21.3128645,105.7203382"
                            width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                @if(count($related_dishes))
                    <div class="discover-food">
                        <div class="top-title-review-block">
                            <h5>Top những món ăn ngon</h5>
                            {{--                        <a class="button-show-more">Xem tất cả</a>--}}
                        </div>
                        <div class="list-product">
                            <div class="slider-product-block d-flex" style="overflow: auto!important;">
                                @foreach($related_dishes as $value)
                                    <div class="slider-product">
                                        <a href="{{route('web.culinary.detail',$value->id)}}">
                                            <div class="img-wrap">
                                                @if($value->video_active == 1)
                                                    <video autoplay loop muted class="img-vertical w-100"
                                                           style="object-fit: cover">
                                                        <source src="{{$value->banner}}">
                                                    </video>
                                                @else
                                                    <img src="{{ $value->banner }}" class="img-vertical w-100"
                                                         style="object-fit: cover"/>
                                                @endif
                                                <div class="tag">
                                                    <p>{{$value->name_category}}</p>
                                                </div>
                                                <div class="desc">
                                                    <div class="text-ellipsis w-10">{{$value->name}}</div>
                                                    <div class="address d-flex">
                                                        <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                                fill="white"/>
                                                        </svg>
                                                        <span
                                                            class="text-ellipsis w-10">{{isset($value->restaurant) ? $value->restaurant->address : null}}</span>
                                                    </div>
                                                    <div class="rating-block align-items-end">
                                                        <div class="name" style="width: 140px">
                                                            <p class="text-ellipsis">{{isset($value->restaurant) ? $value->restaurant->name : null}}</p>
                                                        </div>
                                                        <div>
                                                            <object class="star-rating"
                                                                    data="{{asset('images/travelling/icon/star.svg')}}"
                                                                    type=""></object>
                                                            <span class="number-rating-white">{{$value->ratings}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-slide"></div>
    </section>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js',['slick'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web-mobile/detail-culinary/detail-culinary.js')}}"></script>
    <script src="{{asset('dist/web/detail-culinary/detail-culinary.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@stop
