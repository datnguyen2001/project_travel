<div class="menu-top-1" style="padding-top: 100px">

    <div class="container" >
        <nav class="nav">
            <a href="#tab1_1" class="nav-item is-active">Giới thiệu</a>
            <a href="#tab1_2" class="nav-item">Vị trí địa lí</a>
            <a href="#tab1_3" class="nav-item">Truyền thống & con người</a>
            <span class="nav-indicator"></span>
        </nav>
        <div id="tabs-content">
            <div id="tab1_1" class="tab-content">
                @foreach($introduce as $key =>$value)
                    <h2>{{$value->title}}</h2>
                <div class="row">
                    <div class="col-md-5">
                        <div class="img-wrap">
                            <img src="{{asset('/images/menu-home/gioi-thieu-1.png')}}" class="img-1" />
                            <img src="{{$value->img_1}}" class="img-2" style="width: 256px;height: 342px;object-fit: cover"/>
                            <img src="{{$value->img_2}}" class="img-3" style="width: 235px;height: 175px"/>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5>{{$value->title}}</h5>
                        <p class="introduce">{{$value->content}}</p>
                        <a href="{{route('web.news.introduce')}}" class="btn btn-success looking-more">
                            <span>Tìm hiểu thêm</span>
                            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 0L11.59 1.41L16.17 6H0V8H16.17L11.58 12.59L13 14L20 7L13 0Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
                    @endforeach
            </div>
            <div id="tab1_2" class="tab-content">
                @foreach($geographical as $key =>$value)
                <h2>{{$value->title}}</h2>
                <div class="row">
                    <div class="col-md-5">
                        <div class="img-wrap">
                            <img src="{{$value->img_1}}" class="img-4 w-100" />
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5>{{$value->title}}</h5>
                        <p>{{$value->content}}</p>
                        <a href="{{route('web.news.geographical-location')}}" class="btn btn-success looking-more">
                            <span>Tìm hiểu thêm</span>
                            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 0L11.59 1.41L16.17 6H0V8H16.17L11.58 12.59L13 14L20 7L13 0Z" fill="white" />
                            </svg>
                            </a>
                    </div>
                </div>
                    @endforeach
            </div>
            <div id="tab1_3" class="tab-content">
                @foreach($tradition as $key =>$value)
                <h2>{{$value->title}}</h2>
                <div class="row">
                    <div class="col-md-5">
                        <div class="img-wrap">
                            <img src="{{asset('/images/menu-home/gioi-thieu-1.png')}}" class="img-1" />
                            <img src="{{$value->img_1}}" class="img-5" style="width: 256px;height: 342px;object-fit: cover"/>
                            <img src="{{$value->img_2}}" class="img-6" style="width: 235px;height: 175px"/>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5>{{$value->title}}</h5>
                        <p>{{$value->content}}</p>
                        <a href="{{route('web.news.tradition')}}" class="btn btn-success looking-more">
                            <span>Tìm hiểu thêm</span>
                            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 0L11.59 1.41L16.17 6H0V8H16.17L11.58 12.59L13 14L20 7L13 0Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div> <!-- END tabs-content -->
    </div>
</div>
