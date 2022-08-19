@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Trang chủ - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css')
    <link rel="stylesheet" href="{{asset('dist/web/detail-news-culinary/detail-news-culinary.css')}}">
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    @include('web.detail-news-culinary.content')
    @include('web.detail-news-culinary.blog')
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js')
@stop
@section('script_page')
    <script src="{{asset('dist/web/detail-news-culinary/detail-news-culinary.js')}}"></script>
@stop
