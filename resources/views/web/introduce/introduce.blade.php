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
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    @include('web.introduce.feature')
    @include('web.introduce.connection')
    @include('web.introduce.what-in-the-app')
    @include('web.introduce.travel-guide')
    @include('web.introduce.location-search')
    @include('web.introduce.connection-2')
    @include('web.introduce.connection-3')
    @include('web.introduce.support')
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/introduce/introduce.js')}}"></script>
@stop
