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
            @foreach($geographical as $value)
            <div class="block-detail-new">
                <h3 class="title">{{$value->title}}</h3>
                <div class="actor">
                    Tác giả: {{$value->author}}<span class="dots">|</span>Ngày đăng: {{date('d-m-Y',strtotime($value->created_at))}}
                </div>
                <img src="{{$value->src}}" alt="" class="w-100 d-block banner">
                <div class="short-desc detail-new-1">
                   {{$value->content}}
                </div>
                <div class="long-desc">
                    {!! $value->posts !!}
                </div>
{{--                <div class="suggestion">--}}
{{--                    <h3 class="title">Success is how high you bounce when you hit bottom</h3>--}}
{{--                    <div class="desc-suggestion">--}}
{{--                        Our should never complain, complaining is a weak emotion, you gotlife, we breathing, we blessed. Surround yourself with angels. They never said winning was easy. Some people can’t handle success I can. Look at the sunset.Nmply dummy text of the printing and typ esetting industry. Lorem Ipsum has been the industry’s st andard dummy text ever since the 1500s, when an unknown printer took a galley of type andse aerr crambled it to make a type specimen book.--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="recommend-new">
                    <h3 class="title">Có thể bạn cũng quan tâm</h3>
                    @foreach($category_tourism as $key => $value)
                    <div class="row list-recommend-new">
                        @foreach($value->travel_articles as $item)
                            <div class="col-lg-4 col-md-12 col-sm-12 card-review-main">
                                <a href="{{route('web.news.detail',$item->slug)}}">
                                    <div class="card-review">
                                        @if($item->is_video == 1)
                                            <video autoplay loop muted class="image-review img-horizontal w-100 img-view">
                                                <source src="{{$item->src}}">
                                            </video>
                                        @else
                                            <img src="{{ $item->src }}" alt="" class="image-review img-horizontal w-100 img-view">
                                        @endif

                                        <div class="content-review">
                                            <div class="title-review content-drop-1-line">{{$value->title}}</div>
                                            <div class="detail-review content-drop-2-line"> {{$item->content}}</div>
                                            <div class="footer-review">
                                                <span class="date-review">Ngày đăng: {{date('d/m/Y', strtotime($item->created_at))}}</span>
                                                <div class="rating-block">
                                                    <div>
                                                        <object class="star-rating" data="{{asset('images/travelling/icon/star.svg')}}" type=""></object>
                                                    </div>
                                                    <span class="number-rating">{{$item->rating}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                        @endforeach
                    <a href="{{route('web.news')}}" class="watch-all all-hov all">Xem tất cả</a>
                </div>
            </div>
                @endforeach
        </div>
    </section>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js')
@stop
@section('script_page')
@stop
