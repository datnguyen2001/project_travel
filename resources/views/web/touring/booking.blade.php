@extends('web.layouts.master')
@section('title','Hà Nội Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Booking - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/booking/booking.css')}}">
    <style>
        .text-ellipsis {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: initial;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            max-width: 100%;
        }
        input[type="text"]::placeholder {
            text-align: center;
            font-size: 14px;
        }
        .inp-price{
            width: 50%;
            outline: unset;
            border-radius: 4px;
            border: 1px solid #c1d6cc;
        }
    </style>
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <section class="booking">
        <div class="container">
            @include('web.touring.slider')
            @include('web.touring.search')
{{--            @include('web.booking.blog')--}}
            @include('web.touring.booking_detail')
        </div>
    </section>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{url('assets/js/format_currency.js')}}"></script>
    <script src="{{asset('dist/web/booking/booking.js')}}"></script>
@stop
