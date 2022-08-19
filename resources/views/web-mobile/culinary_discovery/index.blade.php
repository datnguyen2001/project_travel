@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
<!-- --meta-- -->
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Du lịch - Vĩnh Phúc Travel">
@stop

<!-- --style for page-- -->
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
    <link rel="stylesheet" href="{{asset('dist/web-mobile/culinary/culinary.css')}}">
@stop
@section('style_page')
@stop

<!-- --content of page-- -->
@section('content')
    @include('web.layouts.banner-top')
    <section class="main">
        <section class="category-section mobile" id="category">
            <div class="container">
                <div class="slider-category-block">
                    @foreach($category as $value)
                        <div
                            class="slider-category slider-category__item    @if(isset($category_id) && $value->id == $category_id) is_active @endif">
                            <a href="{{route('web.culinary.category', $value->id)}}">
                                <div>
                                    <img class="img-category-item" src="{{$value->img}}" alt="">
                                    <div class="category-name">{{$value->name}}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="product-1">
            <div class="container">
                <h3 class="title-name-1">Top những món ăn ngon</h3>
                <div class="slider-product__slick">
                    @foreach($culinary_specialties as $value)
                        <?php
                        $restaurant_culinary = \App\Models\RestaurantCulinaryModel::where('culinary_id', $value->id)->where('top', 1)->first();
                        if (isset($restaurant_culinary)) {
                            $restaurant = \App\Models\RestaurantModel::find($restaurant_culinary->restaurant_id);
                        } else {
                            $restaurant = null;
                        }
                        ?>
                        <div class="slider-product__item">
                            <a href="{{route('web.culinary.detail',$value->id)}}">
                                <div class="img-wrap">
                                    @if($value->video_active == 1)
                                        <video autoplay loop muted class="w-100 img-vertical" style="object-fit: cover">
                                            <source src="{{ $value->banner }}">
                                        </video>
                                    @else
                                        <img class="w-100 img-vertical" src="{{ $value->banner }}"
                                             style="object-fit: cover"/>
                                    @endif
                                    <div class="tag">
                                        <p>{{$value->name_category}}</p>
                                    </div>
                                    <div class="desc">
                                        <div class="w-100 d-flex align-items-center justify-content-between">
                                            <div class="title text-ellipsis w-75">{{$value->name}}</div>
                                            <div class="star"><i class="fa fa-star"></i> {{$value->ratings}}</div>
                                        </div>
                                        <div class="address">
                                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                    fill="white"/>
                                            </svg>
                                            <span class="text-ellipsis w-10 ml-1">{{isset($restaurant) ? $restaurant->address : null}}</span>
                                        </div>
                                        <div class="name">
                                            <p class="text-ellipsis w-10">{{isset($restaurant) ? $restaurant->name : null}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="product-3">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h3 class="title-name-1">Tất cả ẩm thực</h3>
                    {{--                <a class="button-show-more-all">Xem tất cả</a>--}}
                </div>
                <div class="slider-product__slick">
                    @foreach($data_culinary as $value)
                        <?php
                        $restaurant_culinary = \App\Models\RestaurantCulinaryModel::where('culinary_id', $value->id)->where('top', 1)->first();
                        if (isset($restaurant_culinary)) {
                            $restaurant = \App\Models\RestaurantModel::find($restaurant_culinary->restaurant_id);
                        } else {
                            $restaurant = null;
                        }
                        ?>
                        <div class="slider-product__item">
                            <a href="{{route('web.culinary.detail',$value->id)}}">
                                <div class="img-wrap">
                                    @if($value->video_active == 1)
                                        <video autoplay loop muted class="w-100 image-review img-horizontal"
                                               style="object-fit: cover">
                                            <source src="{{ $value->banner }}">
                                        </video>
                                    @else
                                        <img class="image-review img-horizontal" srcset="{{ $value->banner }} 2x"
                                             alt="">
                                    @endif
                                    <div class="tag">
                                        <p>{{$value->name_category}}</p>
                                    </div>
                                    <div class="desc">
                                        <div class="w-100 d-flex align-items-center justify-content-between">
                                            <div class="title text-ellipsis w-75">{{$value->name}}</div>
                                            <div class="star"><i class="fa fa-star"></i> {{$value->ratings}}</div>
                                        </div>
                                        <div class="address">
                                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                    fill="white"/>
                                            </svg>
                                            <span class="text-ellipsis w-10 ml-1">{{isset($restaurant) ? $restaurant->address : null}}</span>
                                        </div>
                                        <div class="name">
                                            <p class="text-ellipsis w-10">{{isset($restaurant) ? $restaurant->name : null}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="product-2">
            <div class="container">
                <h3 class="title-name-1">Ăn gì ở đây?</h3>
                <div class="slider-product__slick">
                    @foreach($culinary as $value)
                        <?php
                        $restaurant_culinary = \App\Models\RestaurantCulinaryModel::where('culinary_id', $value->id)->where('top', 1)->first();
                        if (isset($restaurant_culinary)) {
                            $restaurant = \App\Models\RestaurantModel::find($restaurant_culinary->restaurant_id);
                        } else {
                            $restaurant = null;
                        }
                        ?>
                        <div class="slider-product__item">
                            <a href="{{route('web.culinary.detail',$value->id)}}">
                                <div class="img-wrap">
                                    @if($value->video_active == 1)
                                        <video autoplay loop muted class="w-100 img-vertical" style="object-fit: cover">
                                            <source src="{{ $value->banner }}">
                                        </video>
                                    @else
                                        <img class="w-100 img-vertical" src="{{ $value->banner }}"
                                             style="object-fit: cover"/>
                                    @endif
                                    <div class="tag">
                                        <p>{{$value->name_category}}</p>
                                    </div>
                                    <div class="desc">
                                        <div class="w-100 d-flex align-items-center justify-content-between">
                                            <div class="title text-ellipsis w-75">{{$value->name}}</div>
                                            <div class="star"><i class="fa fa-star"></i> {{$value->ratings}}</div>
                                        </div>
                                        <div class="address">
                                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                    fill="white"/>
                                            </svg>
                                            <span class="text-ellipsis w-10 ml-1">{{isset($restaurant) ? $restaurant->address : null}}</span>
                                        </div>
                                        <div class="name">
                                            <p class="text-ellipsis w-10">{{isset($restaurant) ? $restaurant->name : null}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="feedback-review-category-section mobile">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h3 style="font-size: 1.25rem !important; font-weight: 600;">Đánh giá và review</h3>
{{--                    <a class="button-show-more" style="color: #333">Xem tất cả</a>--}}
                </div>
                <div class="feedback-and-review d-flex" style="overflow: auto!important;">
                    @foreach($articles_review as $value)
                        <div style="min-width: 258px; height: 264px; margin-right: 1.5rem">
                            <div class="card-review">
                                <a href="{{route('web.articles.detail', $value->slug)}}">
                                    @if($value->is_video == 1)
                                        <img class="image-review img-horizontal " srcset="{{ $value->banner }} 2x" style="object-fit: cover;width: 100%!important;" alt="">
                                    @else
                                        <video autoplay muted loop class="image-review img-horizontal w-100" style="object-fit: cover;width: 100%!important;">
                                            <source src="{{$value->banner}}" type="video/mp4">
                                        </video>
                                    @endif
                                </a>
                                <div class="content-review">
                                    <a href="{{route('web.articles.detail', $value->slug)}}">
                                        <div class="title-review content-drop-1-line">{{$value->title}}</div>
                                        <div class="detail-review content-drop-2-line" style="height: 42px">{{$value->content}}
                                        </div>
                                    </a>
                                    <div class="footer-review">
                                        <span class="date-review">Ngày đăng: {{date('d/m/Y', strtotime($value->created_at))}}</span>
                                        <div class="rating-block">
                                            <div>
                                                <object class="star-rating"
                                                        data="{{('images/travelling/icon/star.svg')}}" type=""></object>
                                            </div>
                                            <span class="number-rating">{{$value->rating}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>

@stop
<!-- --script for page-- -->
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script src="{{asset('dist/web-mobile/culinary/culinary.js')}}"></script>
@stop
