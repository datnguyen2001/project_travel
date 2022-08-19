<div class="menu-top-2">
    <div class="container" style="padding-top: 100px">
        <div class="menu-home-2">
            <nav class="nav">
                <a href="#tab1" class="nav-item-1 is-active">Ẩm thực</a>
                <a href="#tab2" class="nav-item-1">Booking</a>
                <a href="#tab3" class="nav-item-1">Gian hàng</a>
                <span class="nav-indicator-1"></span>
            </nav>

        </div>
    </div>
    <div class="tabs-content-wrap">
        <div class="menu-home-2">
            <div id="tabs-content">
                <div id="tab1" class="tab-content-1">
                    <h2>Khám phá quanh đây</h2>
                    <div class="row">
                        @foreach($culinary as $value)
                        <div class="col-md-3" style="padding-left: 10px;padding-right: 10px">
                            <a href="{{route('web.culinary.detail',$value->id)}}">
                                <div class="img-wrap position-relative">
                                    @if($value->video_active == 1)
                                        <video class=" img-vertical" autoplay loop muted style="object-fit: cover;width: 100%"  >
                                            <source src="{{$value->banner}}" class="img-vertical">
                                        </video>
                                    @else
                                        <img src="{{ $value->banner }}" class="img-vertical" />

                                    @endif
                                    <div class="tag">
                                        <p>{{$value->name_category}}</p>
                                    </div>
                                    <div class="desc">
                                        <div class="title" style="overflow: hidden;text-overflow: ellipsis;white-space: initial;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;max-width: 100%;">{{$value->name}}</div>
                                        <div class="star"><i class="fa fa-star"></i>{{isset($value->restaurant) ? $value->restaurant->rating : null}}</div>
                                        <div class="address d-flex">
                                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z" fill="white" />
                                            </svg>
                                            <span class="title content-drop-1-line w-75 ml-1" style="display: unset!important;">{{isset($value->restaurant) ? $value->restaurant->address : null}}</span>
                                        </div>
                                        <div class="name text-ellipsis">
                                            <p class="w-75 " style="overflow: hidden;text-overflow: ellipsis;white-space: initial;display: -webkit-box;-webkit-line-clamp: 1; -webkit-box-orient: vertical;max-width: 100%;">{{isset($value->restaurant) ? $value->restaurant->name : null}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <a href="{{route('web.culinary')}}" class="watch-all">Xem tất cả</a>
                    </div>
                </div>
                <div id="tab2" class="tab-content-1">
                    <h2>Khám phá quanh đây</h2>
                    <div class="row">
                        @foreach($hotel as $value)
                        <div class="col-md-3" style="padding-left: 10px;padding-right: 10px">
                            <a href="{{route('web.booking.detail',$value->slug)}}">
                                <div class="img-wrap">
                                    @if($value->is_video == 1)
                                        <video class="w-100 h-100 position-absolute" autoplay loop muted style="width: 100%;object-fit: cover" >
                                            <source src="{{$value->banner}}">
                                        </video>
                                    @else
                                        <img src="{{ $value->banner }}" class="img-vertical" />

                                    @endif
                                    <div class="tag">
                                        <p>{{$value->name_category}}</p>
                                    </div>
                                    <div class="desc">
                                        <div class="title " style="overflow: hidden;text-overflow: ellipsis;white-space: initial;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;max-width: 100%;">{{$value->name}}</div>
                                        <div class="star"><i class="fa fa-star"></i> {{ $value->rating }}</div>
                                        <div class="address d-flex">
                                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z" fill="white" />
                                            </svg>
                                            <span class="title content-drop-1-line w-75 ml-1" style="display: unset!important;">{{$value->address}}</span>
                                        </div>
                                        <div class="name" style="width: 158px">
                                            <p  style="width: 60%;overflow: hidden;text-overflow: ellipsis;white-space: initial;-webkit-line-clamp: 1; -webkit-box-orient: vertical;max-width: 100%;">{{number_format($value->price)}}đ-{{number_format($value->price_2)}}đ</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <a href="{{route('web.booking.index')}}" class="watch-all">Xem tất cả</a>
                    </div>
                </div>
                <div id="tab3" class="tab-content-1">
                    <h2>Khám phá quanh đây</h2>
                    <div class="row">
                        @foreach($booth as $value)
                            <div class="col-md-3" style="padding-left: 10px;padding-right: 10px">
                                <a href="{{route('web.explore-stall.detail',$value->slug)}}">
                                    <div class="img-wrap">
                                        @if($value->video_active == 1)
                                            <video class="w-100 h-100 position-absolute" autoplay loop muted style="width: 100%;object-fit: cover" >
                                                <source src="{{$value->banner}}">
                                            </video>
                                        @else
                                            <img src="{{ $value->banner}}" class="img-vertical" />
                                        @endif
                                        <div class="tag">
                                                <p>{{$value->name_category}}</p>
                                        </div>
                                        <div class="desc">
                                            <div class="title" style="overflow: hidden;text-overflow: ellipsis;white-space: initial;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;max-width: 100%;">{{ $value->name}}</div>
                                            <div class="star"><i class="fa fa-star"></i>{{ $value->ratings}}</div>
                                            <div class="address d-flex">
                                                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.9987 8.5013C6.08203 8.5013 5.33203 7.7513 5.33203 6.83464C5.33203 5.91797 6.08203 5.16797 6.9987 5.16797C7.91536 5.16797 8.66536 5.91797 8.66536 6.83464C8.66536 7.7513 7.91536 8.5013 6.9987 8.5013ZM11.9987 7.0013C11.9987 3.9763 9.79036 1.83464 6.9987 1.83464C4.20703 1.83464 1.9987 3.9763 1.9987 7.0013C1.9987 8.9513 3.6237 11.5346 6.9987 14.618C10.3737 11.5346 11.9987 8.9513 11.9987 7.0013ZM6.9987 0.167969C10.4987 0.167969 13.6654 2.8513 13.6654 7.0013C13.6654 9.76797 11.4404 13.043 6.9987 16.8346C2.55703 13.043 0.332031 9.76797 0.332031 7.0013C0.332031 2.8513 3.4987 0.167969 6.9987 0.167969Z" fill="white" />
                                                </svg>
                                                <span class="title content-drop-1-line w-75 ml-1" style="display: unset!important;">{{ $value->address}}</span>
                                            </div>
                                            <div class="name" style="width: 158px">
                                                <p  style="width: 60%;overflow: hidden;text-overflow: ellipsis;white-space: initial;-webkit-line-clamp: 1; -webkit-box-orient: vertical;max-width: 100%;">{{number_format($value->price)}}đ-{{number_format($value->price_2)}}đ</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                        <a href="{{route('web.explore-stall')}}" class="watch-all">Xem tất cả</a>
                    </div>
                </div>
            </div> <!-- END tabs-content -->
        </div>

    </div>
</div>
