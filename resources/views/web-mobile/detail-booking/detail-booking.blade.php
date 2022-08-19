@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Trang chủ - Vĩnh Phúc Travel">
    <style>
        .popup-form, .popup-slide,.popup-utilities {
            top: 100%;
            left: 0;
            opacity: 0;
            z-index: -100;
            transition: .5s;
            background: #33333380;
        }
        .popup-slide.active{
            top: 0;
            opacity: 1;
            z-index: 10000;
        }
        .popup-form.active{
            top: 0;
            opacity: 1;
            z-index: 10000;
        }
        .popup-utilities.active{
            top: 0;
            opacity: 1;
            z-index: 10000;
        }

        .position-relative{
            width: 90%!important;
        }
        .item-room{
            background: #FFFFFF;
            border-radius: 8px;
            max-width: 608px;
            padding: 16px;
        }
        .name-room{
            font-weight: 600;
            font-size: 18px;
            color: #333333;
        }
        .price-room{
            font-weight: 600;
            font-size: 16px;
            color: #0FD200;
        }
        .text-info{
            font-weight: 600;
            font-size: 22px;
            color: #333333 !important;
        }
        #carouselExampleControls{
            width: 85% !important;
        }
        .img-utiliti{
            width: 35px!important;
        }
        .room-util{
            width: 50%;
        }
        .utiliti-room{
            flex-direction: column;
            overflow: auto;
            height: 270px;
        }
        .address-room{
            display: -webkit-box!important;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1!important;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/detail-booking/detail-booking.css')}}">
    <link rel="stylesheet" href="{{asset('dist/web-mobile/detail-booking/detail-booking.css')}}">
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web-mobile.detail-booking.slider-top')
    <div class="container-fluid detail-booking">
        <section id="detail-booking">
            @include('web-mobile.detail-booking.detail-info')
            @include('web-mobile.detail-booking.rating')
            @include('web-mobile.detail-booking.address-map')
            @include('web-mobile.detail-booking.booking-room')
        </section>
        <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-slide"></div>
        <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-utilities"></div>
        <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-form"></div>
    </div>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web-mobile/detail-booking/detail-booking.js')}}"></script>
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
