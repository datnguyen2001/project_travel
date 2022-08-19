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
        .link-tour{
            padding: 0!important;
        }
        .cate-tour-mb{
            height: 105px!important;
            width: 119px!important;
            object-fit: cover;
            border-radius: 16px;
            transform: scale(1.0);
            transition: 0.3s ease-in-out;
        }
        .cate-tour-mb:hover{
            transform: scale(1.5);
        }
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
        .slide-tour{
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
    @include('web-mobile.tour.category')
    @include('web-mobile.tour.image-category')
    @include('web-mobile.tour.video-category')
    @include('web-mobile.tour.feedback-and-review-category')
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/travelling/travelling.js')}}"></script>
    <script src="{{asset('dist/web-mobile/travelling/travelling.js')}}"></script>
    <script src="{{asset('dist/web/tour/tour.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

@stop
