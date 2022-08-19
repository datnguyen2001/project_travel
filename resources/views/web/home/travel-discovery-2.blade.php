@if(count($category_culinary))
<section id="travel-discovery-2">
    <div class="container">
        <div class="travel-discovery">
            <nav class="nav">
                @foreach($category_culinary as $value)
                <a href="#tab3_{{$value->id}}" class="nav-item-3 is-active">{{$value->name}}</a>
                @endforeach
                <span class="nav-indicator-3"></span>
            </nav>
            <div id="tabs-content">
                @foreach($category_culinary as $key => $value)
                <div id="tab3_{{$value->id}}" class="tab-content-3">
                    <h2>Trải nghiệm</h2>
                    <div class="row">
                        <div class="silder-travel-discover">
                            <div class="slider-genre__slick">
                                @foreach($value->travel_articles as $item)
                                <div class="slider-genre__item ">
                                    <a href="{{route('web.news.detail',$item->slug)}}" class="d-flex w-100">
                                        <div class="slider-wrap w-100">
                                            <div class="w-100 position-relative" style="padding-top: 70%">
                                                @if($item->is_video == 1)
                                                    <video autoplay loop muted class="position-absolute img-absolute">
                                                        <source src="{{$item->src}}">
                                                    </video>
                                                @else
                                                    <img src="{{ $item->src }}" alt="" class="position-absolute img-absolute">
                                                @endif
                                            </div>
                                            <div class="tag">
                                                <p>{{$value->name}}</p>
                                            </div>
                                            <div class="desc">
                                                <div class="title content-drop-1-line" style="display: -webkit-box!important;">
                                                    {{$item->title}}
                                                </div>
                                                <div class="info content-drop-2-line" style="height: 48px">
                                                    {{$item->content}}
                                                </div>
                                                <div class="footer-review">
                                                    <span class="date-review">Ngày đăng: {{date('d/m/Y', strtotime($item->created_at))}}</span>
                                                    <div class="rating-block">
                                                        <div>
                                                            <object class="star-rating" data="images/travelling/icon/star.svg" type=""></object>
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
                        </div>
                        <a href="{{route('web.news')}}" class="watch-all all-hov">Xem tất cả</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div> <!-- END tabs-content -->
    </div>
</section>
@endif
