@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Trang chủ - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/detail-booking/detail-booking.css')}}">
    <style>
        .popup-form, .popup-slide,.popup-utilities {
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

        .popup-form.active {
            top: 0;
            opacity: 1;
            z-index: 10000;
        }

        .popup-utilities.active{
            top: 0;
            opacity: 1;
            z-index: 10000;
        }
        .item-room {
            background: #FFFFFF;
            border-radius: 8px;
            max-width: 608px;
            padding: 16px;
        }

        .name-room {
            font-weight: 600;
            font-size: 18px;
            color: #333333;
        }

        .price-room {
            font-weight: 600;
            font-size: 16px;
            color: #0FD200;
        }

        .text-info {
            font-weight: 600;
            font-size: 22px;
            color: #333333 !important;
        }

        #carouselExampleControls {
            width: 49% !important;
        }
    </style>
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <div class="container-fluid detail-booking">
        <div class="container">
            <section id="detail-booking">
                <div class="block-booking-detail-info">
                    <div class="d-flex align-items-center">
                        <h3 class="title mb-0">{{$hotel->name}}</h3>
                        <div class="ml-3 d-flex align-items-end text-black">
                            <a href="tel:{{$hotel->phone}}">
                                <img src="images/booking/icon/phone.svg" class="m-0">
                            </a>
                            <span class="ml-2 text-black"
                                  style="font-weight: 600;font-size: 16px;">{{$hotel->phone}}</span>
                        </div>
                    </div>
                    <h5 class="price">{{number_format($hotel->price)}}đ - {{number_format($hotel->price_2)}}đ</h5>
                    <img src="{{asset('images/introduce/5-star.svg')}}" alt="">
                    <div class="booking-info-map">
                        <img class="mr-1 m-0" src="{{asset('images/detail-booking/icon-map.svg')}}" alt="">
                        <span class="mr-1 address">{{$hotel->address}}</span>
                        <a class="btn-view-map" target="_blank" href="{{"https://maps.google.com?q=".$hotel->map}}">Xem
                            bản đồ</a>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success btn-booking-hotel" value="{{$hotel->id}}">Đặt phòng</button>
                    </div>
                </div>
                <div class="booking-list-image">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12" style="width: 617px; height: 362px">
{{--                            @if($hotel->is_video == 1)--}}
{{--                                <video autoplay muted loop class="image-main">--}}
{{--                                    <source src="{{$hotel->banner}}" type="video/mp4">--}}
{{--                                </video>--}}
{{--                            @else--}}
                                <img class="image-main" src="{{$hotel->src}}" alt="">
{{--                            @endif--}}
                        </div>
                        <div class="col-lg-6 col-sm-12" style="width: 617px">
                            <div class="row">
                                <div class="d-flex justify-content-around  position-relative "
                                     style="width: 617px;flex-wrap: wrap" ;>
                                    @foreach($multimedia as $key => $value)
                                        @if($key < 4)
                                            <img class="image-extra" src="{{$value->src}}" alt=""
                                                 style="width: 270px; height: 165px; margin-bottom: 30px;border-radius: 4px">
                                        @elseif($key < 5)
                                            <button
                                                class="img-booking-small position-absolute border-0 text-white show-slide"
                                                value="{{$hotel->id}}" data-value="2"
                                                style="border-radius: 4px;object-fit: cover; background: #7b7b7b80; right: 20px;bottom:30px; font-size: 18px;width: calc(100% / 2 - 39px) !important;height: 165px">
                                                + {{count($multimedia) - 4}}</button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="booking-rating">
                    <h3 class="title">Đánh giá</h3>
                    <div class="rating-detail row">
                        <div class="col-lg-3">
                            <div class="rating-1">
                                <div class="rating"
                                     style="background: conic-gradient(#0FD200 {{$hotel->rating/5 * 100}}%, transparent 0 100%);">
                                    <div class="total-rating">
                                        <b>{{$hotel->rating}}</b>
                                        <p>Rất tốt</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="rating-info table-responsive m-0">
                                <table class="">
                                    <tbody>
                                    <tr>
                                        <td class="td-title" width="10%">Vị trí</td>
                                        <td>
                                            <div class="rating-percent"><span
                                                    style="width: {{$hotel->rating_address/5 * 100}}%"></span></div>
                                        </td>
                                        <td class="pl-3 td-title">{{$hotel->rating_address}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-title" width="10%">Giá cả</td>
                                        <td>
                                            <div class="rating-percent"><span
                                                    style="width: {{$hotel->rating_price/5 * 100}}%"></span></div>
                                        </td>
                                        <td class="pl-3 td-title">{{$hotel->rating_price}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-title" width="10%">Phục vụ</td>
                                        <td>
                                            <div class="rating-percent"><span
                                                    style="width: {{$hotel->rating_service/5 * 100}}%"></span></div>
                                        </td>
                                        <td class="pl-3 td-title">{{$hotel->rating_service}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-title" width="10%">Vệ sinh</td>
                                        <td>
                                            <div class="rating-percent"><span
                                                    style="width: {{$hotel->rating_toilet/5 * 100}}%"></span></div>
                                        </td>
                                        <td class="pl-3 td-title">{{$hotel->rating_toilet}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-title" width="10%">Tiện nghi</td>
                                        <td>
                                            <div class="rating-percent"><span
                                                    style="width: {{$hotel->rating_convenient/5 * 100}}%"></span></div>
                                        </td>
                                        <td class="pl-3 td-title">{{$hotel->rating_convenient}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <p class="rating-desc">“{{$hotel->rating_content}}”</p>
                </div>
                <div class="address-map">
                    <h3 class="title">Địa chỉ gần bạn nhất</h3>
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29793.98038438121!2d105.8194541087431!3d21.02277876319995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1654837449551!5m2!1svi!2s"
                            width="100%" height="425" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="block-list-room">
                    <h3 class="title">Chọn phòng</h3>
                    <div class="list-room">
                        @include('web.detail-booking.room-item')
                    </div>
                    @if(count($proposal_room))
                        <div class="recommend-room">
                            <h3 class="title">Phòng đề xuất</h3>
                            <div class="row mt-4 list-recommend-room">
                                @foreach($proposal_room as $key => $value)
                                    <div class="col-lg-6 mb-3">
                                        <a href="{{route('web.booking.detail',$value->slug)}}">
                                            <div class="recommend-room-item">
                                                <div style="width: 256px;height: 170px">
                                                    <img class="w-100 h-100" src="{{$value->banner}}" alt="">
                                                </div>
                                                <div class="recommend-room_info m-0 pl-4" style="width: calc(100% - 256px)">
                                                    <div class="title-top" style="justify-content: space-between">
                                                        <div
                                                            class="title-recommend content-drop-1-line">{{$value->name}}</div>
                                                        <div class="rating-recommend" style="margin-right: 20px">
                                                            <object
                                                                data="{{asset('images/detail-booking/1-star.svg')}}"></object>
                                                            <span style="color: black">{{$value->rating}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="recommend-room_address" style="margin-bottom: 10px">
                                                        <object
                                                            data="{{asset('images/detail-booking/icon-map.svg')}}"></object>
                                                        <b class="recommend-room_address_info ml-1"
                                                           style="display: -webkit-box!important;-webkit-box-orient: vertical;-webkit-line-clamp: 1!important;overflow: hidden;text-overflow: ellipsis;margin-left: 10px!important;">{{$value->address}}</b>
                                                    </div>
                                                    {{--                                                <div class="recommend-room_giuong">--}}
                                                    {{--                                                    <object data="{{asset('images/detail-booking/giuong.svg')}}"></object>--}}
                                                    {{--                                                    <b class="recommend-room_address_info ml-1">Nhà nghỉ 1 giường đôi</b>--}}
                                                    {{--                                                </div>--}}
                                                    <div class="recommend-room_price">
                                                        {{number_format($value->price)}}đ
                                                        - {{number_format($value->price_2)}}đ
                                                    </div>
                                                    <div class="recommend-room_type">
                                                        /phòng/đêm
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
    <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-slide"></div>
    <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-utilities"></div>
    <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-form"></div>

@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/detail-booking/detail-booking.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        @if(session('booking_error'))
        Swal.fire({
            title: '{{session('booking_error')}}',
            icon: "error",
            showCancelButton: true,
            confirmButtonText: "Xác nhận!"
        });
        @endif
        @if(session('booking_success'))
        Swal.fire({
            title: '{{session('booking_success')}}',
            icon: "success",
            showCancelButton: true,
            confirmButtonText: "Xác nhận!"
        });
        @endif
    </script>
@stop
