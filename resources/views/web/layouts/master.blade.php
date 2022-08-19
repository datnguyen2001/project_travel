<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <base href="{{asset('')}}">
    <meta name="google-site-verification" content="googleeacc2166ce777ac3.html"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('meta')
    {{--Font for web--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Be Vietnam Pro' rel='stylesheet'>
    {{--CSS Plugins--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{asset('/images/logo/vptravel.png')}}" rel="icon">
    <link rel="stylesheet" type="text/css" href="{{asset('web/font-awesome/css/all.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('web/toast/jquery.toast.min.css')}}">
    {{--CSS Page--}}
    <link rel="stylesheet" type="text/css" href="{{asset('dist/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/web/home/css/layout/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/web/home/css/layout/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/web/home/css/layout/scroll-to-top.css')}}">
    @yield('plugins_css')
    @yield('style_page')
</head>
<style>
    body{
        font-family: 'Be Vietnam Pro'!important;
    }
</style>
<body>
{{--Header--}}
@if(!isset($is_detail_booking) || !$is_detail_booking)
    @include('web.partials.header')
@endif

{{--Content Page--}}
{{--Scroll To Top--}}
@include('web.partials.scroll-to-top')
<main>
    @yield('content')
</main>

{{--Footer--}}
@include('web.partials.footer')

{{--JS Plugins--}}
<script src="{{asset('web/jquery/jquery.min.js')}}"></script>
<script src="{{asset('web/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('web/toast/jquery.toast.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
@yield('plugins_js')
{{--JS Page--}}
<script src="{{asset('dist/main.js')}}"></script>
@yield('script_page')
</body>
</html>
