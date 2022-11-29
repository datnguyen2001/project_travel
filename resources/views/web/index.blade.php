@extends('web.layouts.master')
@section('title','Hà Nội Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Trang chủ - Hà Nội Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/home/home.css')}}">
    <style>
        .looking-more:hover {
            background-color: #28a745 !important;
            transition: 0.2s ease-in-out;
        }

        .all-hov:hover {
            background-color: #0FD200;
            color: white !important;
            transition: 0.3s ease-in-out;
        }
    </style>
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.home.slider-top')
    @include('web.home.tour')
    @include('web.home.menu-home-1')
    @include('web.home.menu-home-2')
    @include('web.home.menu-home-3')
    @include('web.home.travel-discovery')
    @include('web.home.travel-discovery-2')
    @include('web.home.lastest-new')
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/home/home.js')}}"></script>
@stop
