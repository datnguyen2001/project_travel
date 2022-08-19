<div class="block-booking-detail-info">
    <h3 class="title">{{$hotel->name}}</h3>
    <div class="phone">
        <a href="tel:{{$hotel->phone}}">
            <img src="{{asset('image-mobile/detail-booking/phone.svg')}}" alt="">
        </a>
        <span class="phone-number">{{$hotel->phone}} </span>
    </div>
    <h5 class="price">{{number_format($hotel->price)}}đ - {{number_format($hotel->price_2)}}đ</h5>
    <img class="icon-start" src="{{asset('images/introduce/5-star.svg')}}" alt="">
    <div class="booking-info-map">
        <img class="mr-1 m-0 icon-address" src="{{asset('images/detail-booking/icon-map.svg')}}" alt="">
        <span class="mr-1 address">{{$hotel->address}}</span>
    </div>
    <a class="btn-view-map" href="{{"https://maps.google.com?q=".$hotel->map}}">Xem bản đồ</a>
    <div class="mt-3">
        <button class="btn btn-success btn-booking-hotel" value="{{$hotel->id}}">Đặt phòng</button>
    </div>
</div>
