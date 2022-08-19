@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Trang chủ - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css',['slick'=>true])
    <link rel="stylesheet" href="{{asset('dist/web/detail-culinary/detail-culinary.css')}}">
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
    <section id="detail-culinary">
        <div class="container">
            <div class="block-detail-culinary">
                <h3 class="title">{{$culinary->name}}</h3>
                <div class="short-desc">{{$culinary->content}}</div>
                <div class="row culinary-information">
                    <div class="col-lg-8 detail-left">
                        <div class="list-image position-relative" style="padding-top: 70%">
{{--                            @if($culinary->video_active == 1)--}}
{{--                                <video autoplay muted loop controls class="image-main img-culinary-big w-100 d-block position-absolute h-100" style="top: 0; left: 0;object-fit: cover">--}}
{{--                                    <source src="{{$culinary->banner}}" type="video/mp4">--}}
{{--                                </video>--}}
{{--                                @else--}}
                                <img src="{{$culinary->src}}" class="image-main img-culinary-big w-100 d-block position-absolute h-100" style="top: 0; left: 0;object-fit: cover" alt="">
{{--                            @endif--}}
                        </div>
                        <div class="d-flex justify-content-between mt-2 position-relative " >
                            @foreach($multimedia as $key => $item)
                                @if($key < 4)
                                    <img src="{{$item->src}}" alt="" class="image-extra img-culinary-small w-100 " style="border-radius: 4px;object-fit: cover;width: calc(100% / 4 - 10px) !important;">
                                @elseif($key < 5)
                                    <button class="img-booking-small position-absolute border-0 text-white show-slide" value="{{$culinary->id}}" style="border-radius: 4px;object-fit: cover; background: #7b7b7b80; right: 0;top:15px; font-size: 18px;width: calc(100% / 4 - 8px) !important;height: 188px"> + {{count($multimedia) - 4}}</button>
                                @endif
                            @endforeach
                        </div>
                        <div class="long-desc mt-5">{!! $culinary->description !!}</div>
                        @if(isset($culinary->video_review))
                            <h3>Video review về món {{$culinary->name}}</h3>
                            <div class="list-image position-relative" style="padding-top: 50%">
                                <video autoplay muted loop controls class="image-main img-culinary-big w-100 d-block position-absolute h-100" style="top: 0; left: 0;object-fit: cover">
                                    <source src="{{$culinary->video_review}}" type="video/mp4">
                                </video>
                            </div>
                        @endif
                        @if(isset($culinary->menu))
                            <h3>Bảng giá và ưu đãi hấp dẫn của {{$culinary->name}}</h3>
                            <div class="long-desc mt-5">{!! $culinary->menu !!}</div>
                        @endif
                    </div>
                    <div class="col-lg-4 detail-right">
                        <div class="right-top">
                            <h3 class="title-right">Danh sách quán có món ăn này</h3>
                        </div>
                        <div class="list-address">
                            @foreach($restaurant_culinary as $value)
                                @if(isset($value->restaurant))
                                    <div class="address-item">
                                        @if($value->restaurant->type == 1)
                                            <img class="img-address-item" src="{{$value->restaurant->banner}}" alt="" style="object-fit: cover">
                                            @else
                                            <video muted loop autoplay class="img-address-item" style="width: 82px; height: 82px;object-fit: cover">
                                                <source src="{{$value->restaurant->banner}}">
                                            </video>
                                        @endif
                                        <div class="address-detail" style="width: calc(100% - 82px)">
                                            <div class="address-title text-ellipsis">{{$value->restaurant->name}}</div>
                                            <div class="address-map text-ellipsis">
                                                <img class="mr-1" src="{{asset('images/detail-culinary/map.svg')}}" alt="">
                                                <span>{{$value->restaurant->address}}</span>
                                            </div>
                                            <a href="{{"https://maps.google.com?q=".$value->restaurant->map}}" target="_blank" class="add-view-map">Chỉ đường <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="address-main">
                    <h3 class="title">Địa chỉ quán gần bạn nhất</h3>
                    <div class="w-100 map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29793.98038438121!2d105.8194541087431!3d21.02277876319995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1654837449551!5m2!1svi!2s"
                                width="100%" height="425" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                @if(count($related_dishes))
                <div class="discover-food">
                    <h3 class="title">Khám phá món ăn</h3>
                    <div class="list-product">
                        <div class="slider-product__slick">
                            @foreach($related_dishes as $value)
                                <div class="slider-product__item">
                                    <a href="{{route('web.culinary.detail',$value->id)}}">
                                        <div class="img-wrap">
                                            @if($value->video_active == 1)
                                                <video autoplay loop muted class="img-vertical w-100" style="object-fit: cover">
                                                    <source src="{{$value->banner}}">
                                                </video>
                                            @else
                                                <img src="{{ $value->banner }}" class="img-vertical" style="object-fit: cover" />
                                            @endif
                                            <div class="tag">
                                                <p>{{$value->name_category}}</p>
                                            </div>
                                            <div class="desc">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="title m-0 w-75">
                                                        <p class="m-0 text-ellipsis">{{$value->name}}</p>
                                                    </div>
                                                    <div class="star"><i class="fa fa-star"></i> {{$value->ratings}}</div>
                                                </div>
                                                <div class="address text-ellipsis">
                                                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z" fill="white"/>
                                                    </svg>
                                                    <span>{{isset($value->restaurant) ? $value->restaurant->address : null}}</span>
                                                </div>
                                                <div class="name">
                                                    <p class="text-ellipsis">{{isset($value->restaurant) ? $value->restaurant->name : null}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
{{--                    <div class="load-more-button">--}}
{{--                        <button type="button" class="btn btn-view-all">Xem tất cả</button>--}}
{{--                    </div>--}}
                </div>
                @endif
            </div>
        </div>
        <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center popup-slide"></div>
    </section>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js',['slick'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web/detail-culinary/detail-culinary.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

@stop
