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
    <link rel="stylesheet" href="{{asset('dist/web-mobile/detail-new/detail-new.css')}}">
    <style>
        .popup-form,.popup-slide{
            top: 100%;
            left: 0;
            opacity: 0;
            z-index: -100;
            transition: .5s;
            background: #33333380;
        }
        .popup-slide.active{
            top: 0;
            opacity: 1;
            z-index: 10000;
        }
        .slide-room{
            height: 283px !important;
            width: 380px!important;
        }
    </style>
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <section id="detail-new">
        <div class="container" style="padding-bottom: 30px">
            <div class="block-detail-new">
                <div class="position-relative w-100" style="padding-top: 50%">
                    @if($travel_articles->is_video == 1)
                        <video autoplay loop muted class="position-absolute w-100 h-100"
                               style="object-fit: cover;top: 0;left: 0;">
                            <source src="{{$travel_articles->banner}}">
                        </video>
                    @else
                        <img src="{{$travel_articles->banner}}" alt="" class="position-absolute w-100 h-100"
                             style="top: 0;left: 0;object-fit: cover;">
                    @endif
                </div>
                    <h3 class="title " style="overflow: hidden;text-overflow: ellipsis">{{$travel_articles->title}}</h3>
                    <div class="short-desc">
                        {!! $travel_articles->content !!}
                    </div>
                    <div class="list-image">
                        @if(count($multimedia))
                            <div class="row">
                                <div class="col-sm-12 img-left">
                                    <div class="row img-extra-left">
                                        @foreach($multimedia as $key => $value)
                                            @if($key < 2)
                                                <div class="col-sm-6" style="width: 50%">
                                                    <img src="{{$value->src}}" alt="" class="w-100 img-travel-small d-block" style="object-fit: cover">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="img-main">
                                        @foreach($multimedia as $key => $value)
                                            @if($key == 2)
                                                <img src="{{$value->src}}" alt="" class="w-100 img-travel-big d-block" style="object-fit: cover;height: 235px!important;">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="short-desc-2">
                                        {!! $travel_articles->content_img !!}
                                    </div>
                                </div>
                                <div class="col-sm-12 img-right mt-2">
                                    <div class="img-main">
                                        @foreach($multimedia as $key => $value)
                                            @if($key == 3)
                                                <img src="{{$value->src}}" alt="" class="w-100 img-travel-big d-block" style="object-fit: cover; height: 234px">
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="row img-extra-right">
                                        <div class="d-flex justify-content-between mt-2 position-relative w-100">
                                            @foreach($multimedia as $key => $value)
                                                @if($key > 3 && $key < 6)
                                                    <img src="{{$value->src}}" alt="" class="w-100 img-travel-small d-block" style="object-fit: cover; height: 110px;width: 50%;margin-right: 12px;margin-left: 12px">
                                                @elseif($key > 6)
                                                    <button class="img-booking-small position-absolute border-0 text-white show-slide" value="{{$travel_articles->id}}" style="object-fit: cover; background: #7b7b7b80; right: 12px;top:0px; font-size: 18px;width: calc(100% / 2 - 23px) !important;height: 110px"> + {{count($multimedia) - 6}}</button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @if(isset($travel_articles->video_review))
                    <div class="position-relative mt-4 mb-4" style="padding-top: 55%">
                        <video controls class="position-absolute w-100 h-100" style="object-fit: cover;top: 0;left: 0;">
                            <source src="{{$travel_articles->video_review}}">
                        </video>
                    </div>
                @endif
                    <div class="long-desc">
                        {!! $travel_articles->content_video !!}
                    </div>
                    <div class="block-share">
                        <div class="share">Chia sẻ:</div>
                        <a class="icon-share" href=""><img src="{{asset('images/detail-new/fb.svg')}}"></a>
                        <a class="icon-share" href=""><img src="{{asset('images/detail-new/ig.svg')}}"></a>
                        <a class="icon-share" href=""><img src="{{asset('images/detail-new/gg.svg')}}"></a>
                        <a class="icon-share" href=""><img src="{{asset('images/detail-new/tw.svg')}}"></a>
                    </div>
                    @if(count($related_posts))
                        <div class="recommend-new">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="title-recommend">Bài viết liên quan</h3>
                                <a class="btn-view-all-mobile" href="{{route('web.news')}}">Xem tất cả</a>
                            </div>

                            <div class="list-recommend-new">
                                @foreach($related_posts as $value)
                                    <a href="{{route('web.news.detail',$value->slug)}}">
                                        <div class="card-review">
{{--                                            @if($value->is_video == 1)--}}
{{--                                                <video muted autoplay loop class="image-review img-horizontal w-100" style="width: 258px!important;">--}}
{{--                                                    <source src="{{$value->src}}">--}}
{{--                                                </video>--}}
{{--                                            @else--}}
                                                <img class="image-review img-horizontal w-100" src="{{$value->src}}"
                                                     alt="" style="width: 258px!important;">
{{--                                            @endif--}}
                                            <div class="content-review" style="width: 258px">
                                                <div class="title-review" style="overflow: hidden;text-overflow: ellipsis;white-space: initial;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;max-width: 100%;">{{$value->title}}</div>
                                                <div class="detail-review content-drop-2-line" style="height: 42px;">{{$value->content}}
                                                </div>
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
                                @endforeach
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
    <script src="{{asset('dist/web-mobile/detail-new/detail-new.js')}}"></script>
    <script src="{{asset('dist/web/detail-new/detail-new.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@stop
