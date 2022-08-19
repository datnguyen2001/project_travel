@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Du lịch - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/travelling/travelling.css')}}">
    <link rel="stylesheet" href="{{asset('dist/web-mobile/travelling/travelling.css')}}">
    <style>
        .popup-form,.popup-slide{
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
        .slide-room{
            height: 283px !important;
            width: 380px!important;
        }
    </style>
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    @include('web-mobile.travelling.category')
    @include('web-mobile.travelling.image-category')
    @include('web-mobile.travelling.video-category')
    @include('web-mobile.travelling.feedback-and-review-category')
    <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-slide"></div>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/travelling/travelling.js')}}"></script>
    <script src="{{asset('dist/web-mobile/travelling/travelling.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

@stop
