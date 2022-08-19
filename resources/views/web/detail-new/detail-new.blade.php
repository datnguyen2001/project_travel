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
    <link rel="stylesheet" href="{{asset('dist/web/detail-new/detail-new.css')}}">
    <style>
        .popup-form, .popup-slide {
            top: 100%;
            left: 0;
            opacity: 0;
            z-index: -100;
            transition: .5s;
            background: #33333380;
        }

        .popup-slide.active {
            top: 0;
            opacity: 1;
            z-index: 10000;
        }
    </style>
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <section id="detail-new">
        <div class="container" style="padding-bottom: 35px">
            <div class="block-detail-new">
                <div class="position-relative w-100" style="padding-top: 40%;margin-top: 48px">
                    @if($travel_articles->is_video == 1)
                        <video autoplay loop muted class="position-absolute w-100 h-100"
                               style="object-fit: cover;top: 0;left: 0;">
                            <source src="{{$travel_articles->banner}}">
                        </video>
                    @else
                        <img src="{{$travel_articles->banner}}" alt="" class="position-absolute w-100 h-100"
                             style="top: 0;left: 0;object-fit: cover">
                    @endif
                </div>
                <h3 class="title">{{$travel_articles->title}} </h3>
                <div class="short-desc">{!! $travel_articles->content !!}</div>
                <div class="list-image">
                    @if(count($multimedia))
                        <div class="row">
                            <div class="col-lg-6 img-left">
                                <div class="row img-extra-left">
                                    @foreach($multimedia as $key => $value)
                                        @if($key < 2)
                                            <div class="col-lg-6">
                                                <img src="{{$value->src}}" alt="" class="w-100 img-travel-small d-block"
                                                     style="object-fit: cover;height: 180px;width: 300px;">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="img-main">
                                    @foreach($multimedia as $key => $value)
                                        @if($key == 2)
                                            <img src="{{$value->src}}" alt="" class="w-100 img-travel-big d-block"
                                                 style="object-fit: cover">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6 img-right">
                                <div class="img-main">
                                    @foreach($multimedia as $key => $value)
                                        @if($key == 3)
                                            <img src="{{$value->src}}" alt="" class="w-100 img-travel-big d-block"
                                                 style="object-fit: cover">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row img-extra-right" style="margin-top: 23px!important;">
                                    {{--                                @foreach($multimedia as $key => $value)--}}

                                    <div class="d-flex justify-content-between mt-2 position-relative w-100">
                                        @foreach($multimedia as $key => $value)
                                            @if($key > 3 && $key < 6)
                                                <img src="{{$value->src}}" alt="" class="w-100 img-travel-small d-block"
                                                     style="object-fit: cover; height: 180px;width: 300px;margin-right: 12px;margin-left: 12px">
                                            @elseif($key > 6)
                                                <button
                                                    class="img-booking-small position-absolute border-0 text-white show-slide"
                                                    value="{{$travel_articles->id}}"
                                                    style="border-radius: 4px;object-fit: cover; background: #7b7b7b80; right: 12px;top:0px; font-size: 18px;width: calc(100% / 2 - 23px) !important;height: 180px">
                                                    + {{count($multimedia) - 6}}</button>
                                            @endif
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="long-desc">{!! $travel_articles->content_img !!}</div>
                @if(isset($travel_articles->video_review))
                    <div class="position-relative mt-4 mb-4" style="padding-top: 50%">
                        <video controls class="position-absolute w-100 h-100" style="object-fit: cover;top: 0;left: 0;">
                            <source src="{{$travel_articles->video_review}}">
                        </video>
                    </div>
                @endif
                <div class="long-desc">{!! $travel_articles->content_video !!}</div>
                <div class="block-share">
                    <div class="share">Chia sẻ:</div>
                    <a class="icon-share" href=""><img src="{{asset('images/detail-new/fb.svg')}}"></a>
                    <a class="icon-share" href=""><img src="{{asset('images/detail-new/ig.svg')}}"></a>
                    <a class="icon-share" href=""><img src="{{asset('images/detail-new/gg.svg')}}"></a>
                    <a class="icon-share" href=""><img src="{{asset('images/detail-new/tw.svg')}}"></a>
                </div>
                @if(count($related_posts))
                    <div class="recommend-new">
                        <h3 class="title">Bài viết liên quan</h3>
                        <div class="row list-recommend-new">
                            @foreach($related_posts as $value)
                                <div class="col-lg-4 col-md-12 col-sm-12 card-review-main card-d-none">
                                    <a href="{{route('web.news.detail',$value->slug)}}">
                                        <div class="card-review">
{{--                                            @if($value->is_video == 1)--}}
{{--                                                <video muted autoplay loop class="image-review img-horizontal w-100">--}}
{{--                                                    <source src="{{$value->banner}}">--}}
{{--                                                </video>--}}
{{--                                            @else--}}
                                                <img class="image-review img-horizontal w-100" src="{{$value->src}}"
                                                     alt="">
{{--                                            @endif--}}
                                            <div class="content-review">
                                                <div class="title-review content-drop-1-line"
                                                     style="display: -webkit-box!important;">{{$value->title}}</div>
                                                <div class="detail-review content-drop-2-line"
                                                     style="height: 48px">{{$value->content}}</div>
                                                <div class="footer-review">
                                                    <span
                                                        class="date-review">Ngày đăng: {{date('d/m/Y' , strtotime($value->created_at))}}</span>
                                                    <div class="rating-block">
                                                        <div>
                                                            <object class="star-rating"
                                                                    data="{{asset('images/travelling/icon/star.svg')}}"
                                                                    type=""></object>
                                                        </div>
                                                        <span class="number-rating">{{$value->rating}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center" style="padding-bottom: 50px">
                            <a href="{{route('web.news')}}" class="btn bg-white"
                               style="border: 1.5px solid #0FD200;border-radius: 8px; color: #0FD200 !important;">Xem
                                tất cả</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-slide"></div>
    </section>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js')
@stop
@section('script_page')
    <script src="{{asset('dist/web/detail-new/detail-new.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@stop
