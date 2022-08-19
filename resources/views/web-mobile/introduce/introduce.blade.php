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
    <link rel="stylesheet" href="{{asset('dist/web/introduce/introduce.css')}}">
    <link rel="stylesheet" href="{{asset('dist/web-mobile/introduce/introduce.css')}}">
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    @include('web-mobile.introduce.feature')
    @include('web-mobile.introduce.connection')
    @include('web-mobile.introduce.what-in-the-app')
    @include('web-mobile.introduce.travel-guide')
    @include('web-mobile.introduce.location-search')
    @include('web-mobile.introduce.connection-2')
    @include('web-mobile.introduce.connection-3')
    @include('web-mobile.introduce.support')
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/introduce/introduce.js')}}"></script>
    <script src="{{asset('dist/web-mobile/introduce/introduce.js')}}"></script>
@stop
