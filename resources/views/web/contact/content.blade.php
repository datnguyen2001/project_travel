<section class="contact">
    <div class="container-fluid contact-block">
        <div class="container">
            <div class="contact-container">
                <div class="contact-content">
                    <h1 class="contact-heading">
                        Liên hệ với chúng tôi
                    </h1>
                    <p class="contact-desc">
                        But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                        was
                        born and I will give you a complete account of the system.
                    </p>
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <form action="{{route('web.contact.store')}}" method="post">
                        @csrf
                        <div class="contact-item">
                            <h2 class="contact-title">Họ và tên</h2>
                            <input class="form-control contact-input contact-small-input" name="name" type="text" required
                                   placeholder="Họ và tên"/>
                        </div>
                        <div class="contact-item">
                            <h2 class="contact-title">Số điện thoại</h2>
                            <input class="form-control contact-input contact-small-input" name="phone" type="tel" required
                                   placeholder="Số điện thoại"/>
                        </div>
                        <div class="contact-item">
                            <h2 class="contact-title">Email</h2>
                            <input class="form-control contact-input contact-small-input" name="email" type="text"
                                   placeholder="Email"/>
                        </div>
                        <div class="contact-item">
                            <h2 class="contact-title">Lời nhắn của bạn</h2>
                            <textarea class="form-control contact-input contact-large-input" name="note" type="text"
                                      placeholder="Hãy để lại lời nhắn tại đây ...." rows="7"></textarea>
                        </div>
                        <button class="form-control contact-button-submit" type="submit">Gửi liên hệ ngay</button>
                    </form>
                </div>
                <div class="hero-image">
                    <img class="hero-content-image" srcset="{{ asset('images/contact/contact-hero.png') }} 2x" alt=""/>
                    <img class="hero-content-patterns" srcset="{{ asset('images/contact/patterns.png') }} 2x" alt=""/>
                    <div class="contact-box-top">
                        <img class="icon-contact-1" src="{{ asset('images/contact/user.svg') }}">
                        <div class="contact-box-content">
                            <h3 class="contact-box-phone">0327.888.999</h3>
                            <p class="contact-box-desc m-0">Hotline
                        </div>
                    </div>
                    <div class="contact-box-bottom">
                        <img class="icon-contact-2" src="{{ asset('images/contact/hotline.svg') }}">
                        <div class="contact-box-content">
                            <div class="contact-box-title">Hotline</div>
                            <h3 class="contact-box-phone">0327.888.999</h3>
                            <div class="contact-box-desc">Hãy liên hệ với chúng tôi</div>
                        </div>
                    </div>
                    <img class="hero-content-chart" src="{{asset('images/contact/chart.svg')}}">
                </div>
            </div>
        </div>
    </div>
</section>
