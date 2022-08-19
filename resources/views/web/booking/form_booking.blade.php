<form action="{{route('web.booking.room',$room_hotel->id)}}" method="post" class="item-room position-relative">
    @csrf
    <button type="button" class="bg-transparent border-0 close-form position-absolute p-0" style="top: 10px;right: 10px;z-index: 100">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0FD200" clclose-formass="bi bi-x-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
        </svg>
    </button>
    <div class="row border-bottom pb-3">
        <div class="col-4">
            @if($room_hotel->is_video == 1)
                <video loop muted autoplay class="w-100" style="border-radius: 4px">
                    <source src="{{$room_hotel->banner}}">
                </video>
                @else
                <img src="{{$room_hotel->banner}}" class="w-100" style="border-radius: 4px;">
            @endif
        </div>
        <div class="col-8 d-flex align-items-center">
            <div>
                <p class="name-room">{{$room_hotel->name}}</p>
                <p class="price-room">{{number_format($room_hotel->price)}}đ - {{number_format($room_hotel->price_2)}}đ</p>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <p class="text-center text-info">Thông tin liên hệ đặt phòng</p>
        <label>Họ và tên (<span style="color: #E93940">*</span>)</label>
        <input class="form-control" type="text" name="name" required placeholder="Họ và tên">
        <div class="d-flex mt-3">
            <div class="w-50 pr-2">
                <label>Số điện thoại (<span style="color: #E93940">*</span>)</label>
                <input class="form-control" type="tel" name="phone" required placeholder="Số điện thoại">
            </div>
            <div class="w-50 pl-2">
                <label>Email (Nếu có)</label>
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-success btn-booking">Gửi đi</button>
    </div>
</form>
