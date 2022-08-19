<footer style="background-image:url('{{ asset('/images/logo/footer.png') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="introduce">
                    <a href="{{route('web.home')}}">
                        <img style="width: 100px!important;" src="{{ asset('/images/logo/vptravel.png') }}">
                    </a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum
                        consequat imperdiet lorem purus aliquam, at arcu turpis.
                    </p>
                    <div class="network">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/vinhphuctravel/?ref=pages_you_manage">
                                <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <i class="fab fa-twitter"></i>
                            </li>
                            <li>
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="service">
                    <h3>Services</h3>
                    <ul>
                        <li>
                            <a href="{{route('web.booking.index')}}">Booking</a>
                        </li>
                        <li>
                            <a href="{{route('web.travelling')}}">Du lịch</a>
                        </li>
                        <li>
                            <a href="{{route('web.culinary')}}">Ẩm thực</a>
                        </li>
                        <li>
                            <a href="{{route('web.explore-stall')}}">Gian hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="outlook">
                    <h3>Outlook</h3>
                    <ul>
                        <li>
                            <a href="{{route('web.introduce')}}">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="{{route('web.contact')}}">Liên hệ</a>
                        </li>
                        <li>
                            <a href="{{route('web.news')}}">Tin tức</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <form method="post" action="{{route('web.subscribes')}}" class="subscribes">
                    @csrf
                    <h3>Subscribes</h3>
                    <p>Get to know about Ocean Crown, your inbox updates and all news.</p>
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">{{session('error')}}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">{{session('success')}}</div>
                    @endif
                    <div class="input-email">
                        <input type="email" name="email" class="email" required placeholder="Your Email ID">
                        <button><i class="fas fa-angle-right"></i></button>
                    </div>
                </form>

            </div>
        </div>
        <div class="bottom-footer">
            <p>© 2022 All Rights Reserved - designweb.ncp </p>
        </div>
    </div>
</footer>
