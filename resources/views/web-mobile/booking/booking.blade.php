@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Booking - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/booking/booking.css')}}">
    <link rel="stylesheet" href="{{asset('dist/web-mobile/booking/booking.css')}}">

@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <section class="mobile booking">
        <div class="container">
            @include('web-mobile.booking.slider')
            @include('web-mobile.booking.search')
            @include('web-mobile.booking.blog')
            @include('web-mobile.booking.booking_detail')
        </div>
    </section>
    <!-- Modal -->
    @include('web-mobile.booking.popup-filter')
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{url('assets/js/format_currency.js')}}"></script>
    <script src="{{asset('dist/web-mobile/booking/booking.js')}}"></script>
@stop
