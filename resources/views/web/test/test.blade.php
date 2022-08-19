@extends('web.layouts.master')
@section('title','Vĩnh Phúc Travel')
{{--meta--}}
@section('meta')
    <meta name="description" content=""/>
    <meta name="keywords" content="Trang chủ - Vĩnh Phúc Travel">
@stop

{{--style for page--}}
@section('plugins_css')
    @include('web.partials.plugins-css', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('style_page')
    <style>
        .main{
            background: #F9FAFB;
        }
        #category, #product-1, #product-2{
            margin-top: 200px;
        }
        #product-2{
            padding: 40px 0 40px 0;
        }
        .slider-category__item{
            background: #FFFFFF;
            text-align: center;
            padding: 16px 64px;
            box-shadow: 0px 10px 15px rgba(211, 192, 214, 0.07);
            border-radius: 16px;
        }
        .slick-slide{
            margin:0 10px 0 10px;
        }
        .category-name{
            font-weight: 600;
            font-size: 16px;
            color: #111827!important;
            margin-top: 1rem!important;
        }
        div img{
            margin: 0 auto;
        }

        #category .prev-arrow.slick-arrow {
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            left: -5%;
            background: #0FD200;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            color: white;
            border: none;
        }
        #category .next-arrow.slick-arrow{
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            right: -5%;
            background: #0FD200;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            color: white;
            border: none;
        }

    /*    PRODUCT*/
        .img-wrap {
            position: relative;
            border-radius: 2rem 0;
            overflow: hidden;
        }
        .menu-home-2 .img-wrap img {
            width: 100%;
        }
        .tag {
            position: absolute;
            top: 5%;
            left: 10%;
            color: white;
            background: #54DA41;
            font-size: 0.875rem;
            padding: 0.125rem 1rem;
            border-radius: 1rem;
            font-weight: 600;
        }

        .tag p {
            margin: 0;
        }

        .desc {
            padding: 0.625rem;
            position: absolute;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(4px);
            width: 100%;
            color: white;
            text-align: left;
        }

        .title {
            font-weight: 600;
            font-size: 1rem;
            display: inline;
        }
        .star {
            float: right;
        }
        .star i {
            color: yellow;
        }

        .address {
            clear: both;
            font-weight: 400;
            font-size: 0.875rem;
            margin: 0.625rem 0px;
        }

        .name {
            font-weight: 400;
            font-size: 0.875rem;
        }
        .name p {
            margin: 0px;
        }
        #product-1 .prev-arrow.slick-arrow {
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            left: -5%;
            background: #0FD200;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            color: white;
            border: none;
        }
        #product-1 .next-arrow.slick-arrow{
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            right: -5%;
            background: #0FD200;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            color: white;
            border: none;
        }
        #product-2 .prev-arrow.slick-arrow {
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            left: -5%;
            background: #0FD200;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            color: white;
            border: none;
        }
        #product-2 .next-arrow.slick-arrow{
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            right: -5%;
            background: #0FD200;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            color: white;
            border: none;
        }

        .title-name{
            margin: 0 0 2rem 10px;
            font-weight: 600;
            font-size: 1.75rem;
            color: #FFFFFF;
        }
    </style>
@stop

{{--content of page--}}
@section('content')
    @include('web.layouts.banner-top')
    <section class="main">
        <section id="category">
            <div class="container">
                <div class="slider-category__slick">
                    @for($i=0;$i<10;$i++)
                        <div class="slider-category__item">
                            <a href="#">
                                <div>
                                    <img src="{{('images/travelling/icon/nghi-duong.svg')}}" alt="">
                                    <div class="category-name">Nhà nghỉ</div>
                                </div>
                            </a>
                        </div>
                        <div class="slider-category__item">
                            <a href="#" >
                                <div>
                                    <img src="{{('images/travelling/icon/vui-choi.svg')}}" alt="">
                                    <div class="category-name">Vui chơi</div>
                                </div>
                            </a>
                        </div>
                        <div class="slider-category__item">
                            <a href="#" >
                                <div>
                                    <img src="{{('images/travelling/icon/le-chua.svg')}}" alt="">
                                    <div class="category-name">Lửa chùa</div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        <section id="product-1">
            <div class="container">
                <div class="slider-product__slick">
                    @for($i=0;$i<10;$i++)
                        <div class="slider-product__item">
                        <a href="#">
                            <div class="img-wrap">
                                <img class="w-100" src="{{ asset('/images/menu-home/do-an-1.png') }}" />
                                <div class="tag">
                                    <p>Buffet</p>
                                </div>
                                <div class="desc">
                                    <div class="title">Cá Phile Sốt Cam Úc</div>
                                    <div class="star"><i class="fa fa-star"></i> 4.5</div>
                                    <div class="address">
                                        <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                fill="white" />
                                        </svg>
                                        <span>Vĩnh Thịnh, Huyện Vĩnh Tường</span>
                                    </div>
                                    <div class="name">
                                        <p>Anh em Quán</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
        </section>
        <section id="product-2" style="background: url('{{asset('images/banner/banner-product.png')}}')">
            <div class="container">
                <h3 class="title-name">Ăn gì ở đây</h3>
                <div class="slider-product__slick">
                    @for($i=0;$i<10;$i++)
                        <div class="slider-product__item">
                            <a href="#">
                                <div class="img-wrap">
                                    <img class="w-100" src="{{ asset('/images/menu-home/do-an-1.png') }}" />
                                    <div class="tag">
                                        <p>Buffet</p>
                                    </div>
                                    <div class="desc">
                                        <div class="title">Cá Phile Sốt Cam Úc</div>
                                        <div class="star"><i class="fa fa-star"></i> 4.5</div>
                                        <div class="address">
                                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z"
                                                    fill="white" />
                                            </svg>
                                            <span>Vĩnh Thịnh, Huyện Vĩnh Tường</span>
                                        </div>
                                        <div class="name">
                                            <p>Anh em Quán</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </section>
@stop

{{--script for page--}}
@section('plugins_js')
    @include('web.partials.plugins-js', ['slick'=>true, 'sweetalert'=>true])
@stop
@section('script_page')
    <script>
        function SliderCategory() {
            $('.slider-category__slick').slick({
                infinite: true,
                autoplay: true,
                dots: false,
                speed: 800,
                slidesToShow: 5,
                slidesToScroll: 2,
                prevArrow: '<button class="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
                nextArrow: '<button class="next-arrow"><i class="fal fa-chevron-right"></i></button>',
                centerMode: false,
            })
        }
        function SliderProduct() {
            $('.slider-product__slick').slick({
                infinite: true,
                autoplay: true,
                dots: false,
                speed: 800,
                slidesToShow: 4,
                slidesToScroll: 2,
                prevArrow: '<button class="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
                nextArrow: '<button class="next-arrow"><i class="fal fa-chevron-right"></i></button>',
                centerMode: false,
            })
        }
        $(function () {
            SliderCategory();
            SliderProduct();
        });
    </script>
@stop
