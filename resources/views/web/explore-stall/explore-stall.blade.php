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
    <link rel="stylesheet" href="{{asset('dist/web/news/news.css')}}">
    <link rel="stylesheet" href="{{asset('dist/web/explore-stall/explore-stall.css')}}">
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    @include('web.explore-stall.category')
    @include('web.explore-stall.top-famous-specialties')
    @include('web.explore-stall.what-do-eat-here')
    @include('web.explore-stall.blog')
    @include('web.explore-stall.feedback-review')
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/explore-stall/explore-stall.js')}}"></script>
@stop
