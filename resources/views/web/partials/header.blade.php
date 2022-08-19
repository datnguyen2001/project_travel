<header class="header">
    <nav class="navbar">
        <div class="container">
            <section class="wrapper">
                <a href="{{route('web.home')}}">
                    <img src="{{asset('/images/logo/vptravel.png')}}" style="width: 70px">
                </a>
                <button type="button" class="burger" id="burger">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </button>
                <div class="menu" id="menu">
                    <ul class="menu-inner">
                        <li class="menu-item active"><a href="{{route('web.home')}}" class="menu-link">Trang chủ</a></li>
                        <li class="menu-item"><a href="{{route('web.introduce')}}" class="menu-link">Giới thiệu</a></li>
                        <li class="menu-item"><a href="{{route('web.travelling')}}" class="menu-link">Du lịch</a></li>
                        <li class="menu-item"><a href="{{route('web.booking.index')}}" class="menu-link">Booking</a></li>
                        <li class="menu-item"><a href="{{route('web.culinary')}}" class="menu-link">Khám phá ẩm thực</a></li>
                        <li class="menu-item"><a href="{{route('web.explore-stall')}}" class="menu-link">Gian hàng</a></li>
                        <li class="menu-item"><a href="{{route('web.contact')}}" class="menu-link">Liên hệ</a></li>
                    </ul>
                </div>
            </section>
        </div>
    </nav>
</header>
