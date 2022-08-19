@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
<!-- --meta-- -->
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Tin tức - Vĩnh Phúc Travel">
@stop

<!-- --style for page-- -->
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/news/news.css')}}">
@stop
@section('style_page')
@stop

<!-- --content of page-- -->
@section('content')
    @include('web.layouts.banner-top')

    <section id="culinary">
        <div class="container">
            <div class="banner">
                <a href="#">
                    <img src="/images/news/banner.png" class="banner-img" alt="">
                </a>
            </div>
            <div class="featured-news">
                <div class="title title-news">
                    <h3>Tin tức nổi bật</h3>
                </div>
                <div class="data-items"></div>
            </div>
            <div class="travel-discovery">
                <div class="title title-travel">
                    <h3>Khám phá du lịch</h3>
                </div>
                <div class="data-items"></div>
            </div>
            <div class="culinary-discovery">
                <div class="title title-travel">
                    <h3>Khám phá ẩm thực, booking, gian hàng</h3>
                </div>
                <div class="data-items"></div>
            </div>
        </div>
    </section>
    <div class="position-fixed w-100 h-100 loading d-flex align-items-center justify-content-center">
        <img src="{{url('images/menu-home/spinnervlll-unscreen.gif')}}">
    </div>
@stop

<!-- --script for page-- -->
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/news/news.js')}}"></script>
@stop
