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
    <link rel="stylesheet" href="{{asset('dist/web-mobile/news/news.css')}}">
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
        </div>
    </section>
    <section class="feedback-review-category-section mobile">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mt-2">
                <h5 style="font-weight: 600">Tin tức nổi bật</h5>
            </div>
            <div class="feedback-and-review d-flex" style="overflow: auto!important;">
                @for($i = 0; $i < 15; $i++)
                    <div style="min-width: 250px; height: auto; margin-right: 1rem">
                        <div class="card-review">
                            <a href="{{route('web.news.detail', 1)}}">
                                <img class="image-review img-horizontal" src="{{('images/travelling/image-review.png')}}" alt="">
                            </a>
                            <div class="content-review">
                                <a href="{{route('web.news.detail', 1)}}">
                                    <div class="title-review content-drop-1-line">Flamingo Dai Lai Resort</div>
                                    <div class="detail-review content-drop-2-line">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Aliquam tempor
                                    </div>
                                </a>
                                <div class="footer-review">
                                    <span class="date-review">Ngày đăng: 20/12/2022</span>
                                    <div class="rating-block">
                                        <div>
                                            <object class="star-rating" data="{{('images/travelling/icon/star.svg')}}" type=""></object>
                                        </div>
                                        <span class="number-rating">4.5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <h5 style="font-weight: 600">Khám phá du lịch</h5>
            </div>
            <div class="feedback-and-review d-flex" style="overflow: auto!important;">
                @for($i = 0; $i < 15; $i++)
                    <div style="min-width: 250px; height: auto; margin-right: 1rem">
                        <div class="card-review">
                            <a href="{{route('web.news.detail', 1)}}">
                                <img class="image-review img-horizontal" src="{{('images/travelling/image-review.png')}}" alt="">
                            </a>
                            <div class="content-review">
                                <a href="{{route('web.news.detail', 1)}}">
                                    <div class="title-review content-drop-1-line">Flamingo Dai Lai Resort</div>
                                    <div class="detail-review content-drop-2-line">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Aliquam tempor
                                    </div>
                                </a>
                                <div class="footer-review">
                                    <span class="date-review">Ngày đăng: 20/12/2022</span>
                                    <div class="rating-block">
                                        <div>
                                            <object class="star-rating" data="{{('images/travelling/icon/star.svg')}}" type=""></object>
                                        </div>
                                        <span class="number-rating">4.5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@stop

<!-- --script for page-- -->
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web-mobile/news/news.js')}}"></script>
@stop
