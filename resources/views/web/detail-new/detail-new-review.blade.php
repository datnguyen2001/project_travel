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
@stop
@section('style_page')
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <section id="detail-new">
        <div class="container">
            <div class="block-detail-new">
                <h3 class="title">{{$travel_articles->title}}</h3>
                <div class="actor">
                    Tác giả: {{$travel_articles->author}}<span class="dots">|</span>Ngày đăng: {{date('d-m-Y', strtotime($travel_articles->created_at))}}
                </div>
                @if($travel_articles->is_video == 1)
                    <img src="{{$travel_articles->src}}" alt="" class="w-100 d-block banner">
                @else
                    <video controls class="w-100 d-block banner">
                        <source src="{{$travel_articles->banner}}">
                    </video>
                @endif
                <div class="short-desc detail-new-1">{{$travel_articles->content}}</div>
                @if(isset($travel_articles->img_1))
                    <div class="row m-0 p-0">
                        <div class="col-lg-7 pl-0">
                            <img src="{{$travel_articles->img_1}}" class="w-100">
                        </div>
                        <div class="col-lg-5" style="padding: 0px;padding-top: 10px">{!! $travel_articles->content_1 !!}</div>
                    </div>
                @endif
                @if(isset($travel_articles->img_1))
                <div class="row m-0 p-0">
                    <div class="col-lg-7 pl-0">
                        {!! $travel_articles->content_2 !!}
                    </div>
                    <div class="col-lg-5" style="padding-left: 0!important;"><img src="{{$travel_articles->img_2}}" class="w-100" ></div>
                </div>
                @endif
                <div class="long-desc">
                    {!! $travel_articles->description !!}
                </div>
                @if(isset($travel_articles->video))
                    <div class="list-image position-relative" style="padding-top: 50%">
                        <video autoplay muted loop controls class="image-main img-culinary-big w-100 d-block position-absolute h-100" style="top: 0; left: 0;object-fit: cover">
                            <source src="{{$travel_articles->video}}" type="video/mp4">
                        </video>
                    </div>
{{--                <video class="video-review w-100" id="player" controls src="{{$travel_articles->video}}"></video>--}}
                @endif
                @if(isset($travel_articles->content_video))
                <div class="suggestion">{!! $travel_articles->content_video !!}</div>
                @endif
                @if(count($data_articles))
                <div class="recommend-new">
                    <h3 class="title">Có thể bạn cũng quan tâm</h3>
                    <div class="row list-recommend-new">
                        @foreach($data_articles as $value)
                            <div class="col-lg-4 col-md-12 col-sm-12 card-review-main">
                                <a href="{{route('web.articles.detail',$value->slug)}}">
                                    <div class="card-review">
                                        @if($value->is_video == 1)
                                            <img class="image-review img-horizontal w-100 img-mb" src="{{$value->banner}}" alt="">
                                        @else
                                            <video class="image-review img-horizontal w-100 img-mb" autoplay loop muted>
                                                <source src="{{$value->banner}}">
                                            </video>
                                        @endif
                                        <div class="content-review">
                                            <div class="title-review content-drop-1-line" style="display: -webkit-box!important;">{{$value->title}}</div>
                                            <div class="detail-review content-drop-2-line" style="height: 48px">{{$value->content}}</div>
                                            <div class="footer-review">
                                                <span class="date-review">Ngày đăng: {{date('d/m/Y', strtotime($value->created_at))}}</span>
                                                <div class="rating-block">
                                                    <div>
                                                        <object class="star-rating" data="{{asset('images/travelling/icon/star.svg')}}" type=""></object>
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
                </div>
                @endif
            </div>
        </div>
    </section>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js')
@stop
@section('script_page')
@stop
