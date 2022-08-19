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
    <link rel="stylesheet" href="{{asset('dist/web/detail-stall/detail-stall.css')}}">
    <link rel="stylesheet" href="{{asset('dist/web-mobile/detail-stall/detail-stall.css')}}">
    <style>
        .popup-slide {
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
            height: 310px !important;
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
                <h5>{{$booth->name}}</h5>
                <div class="short-desc">
                    {{$booth->content}}
                </div>
                <div class="culinary-information">
                    <div class="detail-left">
                        <div class="list-image ">
{{--                            @if($booth->video_active == 1)--}}
{{--                                <video autoplay muted loop controls class="image-main img-culinary-big w-100 d-block  "--}}
{{--                                       style="top: 0; left: 0;object-fit: cover">--}}
{{--                                    <source src="{{$booth->banner}}" type="video/mp4">--}}
{{--                                </video>--}}
{{--                            @else--}}
                                <img src="{{$booth->src}}" class="image-main img-culinary-big w-100 d-block "
                                     style="top: 0; left: 0;object-fit: cover" alt="">
{{--                            @endif--}}

                        </div>
                        <div class="row image-extra" style="margin: 0">
                            <div class="d-flex justify-content-between mt-2 position-relative " >
                            @foreach($multimedia as $key => $value)
                                @if($key < 4)
                                    <img src="{{$value->src}}" class="image-extra img-culinary-small w-100" alt="" style="object-fit: cover;width: calc(100% / 4 - 10px) !important;height: 76px">
                                @elseif($key < 5)
                                    <button class="img-booking-small position-absolute border-0 text-white show-slide" value="{{$booth->id}}" style="object-fit: cover; background: #7b7b7b80; right: 0; font-size: 18px;width: calc(100% / 4 - 9px) !important;height: 76px"> + {{count($multimedia) - 4}}</button>
                                @endif
                            @endforeach
                            </div>
                        </div>
                        <div class="long-desc ">{!! $booth->description !!}</div>
                    </div>
                </div>
                <div class="content-detail">
                    @if(isset($booth->video_review))
                        <h5>Video review về món {{$booth->name}}</h5>
                        <div class="list-image position-relative" style="padding-top: 50%">
                            <video autoplay muted loop controls
                                   class="image-main img-culinary-big w-100 d-block position-absolute h-100"
                                   style="top: 0; left: 0;object-fit: cover">
                                <source src="{{$booth->video_review}}" type="video/mp4">
                            </video>
                        </div>
                    @endif
                    @if(isset($booth->menu))
                        <h3>Bảng giá và ưu đãi hấp dẫn của {{$booth->name}}</h3>
                        <div class="long-desc mt-5">{!! $booth->menu !!}</div>
                    @endif
                </div>

                <div class="list-store">
                    <h5>Danh sách quán có món ăn này</h5>
                    <div class="store-block">
                        @foreach($data_booth as $value)
                            <div class="store-item" style="width: 340px!important;">
                                @if($value->video_active == 1)
                                    <video muted loop autoplay class="img-address-item"
                                           style="width: 82px; height: 82px;object-fit: cover">
                                        <source src="{{$value->banner}}">
                                    </video>
                                @else
                                    <img class="img-address-item" src="{{$value->banner}}" alt=""
                                         style="object-fit: cover; width: 82px!important; height: 82px!important;">
                                @endif
                                <div class="detail-store">
                                    <div class="name-store content-drop-1-line">{{$value->name}}</div>
                                    <div class="location-store">
                                        <img src="{{asset('images/detail-culinary/map.svg')}}" alt="">
                                        <span class="address-store content-drop-1-line">{{$value->address}}</span>
                                    </div>
                                    <a href="{{url('https://maps.google.com?q='.$value->map)}}" target="_blank"
                                       class="view-map">Chỉ đường <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="address-main">
                    <h5>Địa chỉ quán gần bạn nhất</h5>
                    <div class="w-100 map">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDX1GYdRZFd5R588gS3r4L6t5QB9ehJ-jU&q=21.3128645,105.7203382"
                            width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="discover-food">
                    <div class="top-title-review-block">
                        <h5>Top những món ăn ngon</h5>
                        {{--                        <a class="button-show-more">Xem tất cả</a>--}}
                    </div>
                    <div class="list-product">
                        <div class="slider-product-block d-flex" style="overflow: auto!important;">
                            @foreach($data_booth as $value)
                                <div class="slider-product">
                                    <a href="{{route('web.explore-stall.detail',$value->slug)}}">
                                        <div class="img-wrap">
                                            @if($value->video_active == 1)
                                                <video autoplay loop muted class="img-vertical w-100"
                                                       style="object-fit: cover;height: 252px!important;">
                                                    <source src="{{$value->banner}}">
                                                </video>
                                            @else
                                                <img class="w-100 img-vertical" src="{{ $value->banner }}"
                                                     style="object-fit: cover; height: 252px!important;"/>
                                            @endif
                                            <div class="tag">
                                                <p>{{$value->name_category}}</p>
                                            </div>
                                            <div class="desc">
                                                <div class="title content-drop-1-line">{{$value->name}}</div>
                                                <div class="address" style="display: flex">
                                                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                            fill="white"/>
                                                    </svg>
                                                    <span class="content-drop-1-line" style="margin-left: 5px">{{$value->address}}</span>
                                                </div>
                                                <div class="rating-block align-items-end">
                                                    <div class="name content-drop-1-line" style="width: 141px">
                                                        <p>{{number_format($value->price)}}đ
                                                            - {{number_format($value->price_2)}}đ</p>
                                                    </div>
                                                    <div>
                                                        <object class="star-rating"
                                                                data="{{asset('images/travelling/icon/star.svg')}}"
                                                                type=""></object>
                                                        <span class="number-rating-white"> {{$value->ratings}}</span>
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
    <script src="{{asset('dist/web/detail-stall/detail-stall.js')}}"></script>
    <script src="{{asset('dist/web-mobile/detail-stall/detail-stall.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@stop
