@php
    $rating_percent = rand(00,99);
    $rating_total = rand(0.0,10.0);
    $rating_result = ["Rất tốt", "Tốt", "Khá", "Bình thường", "Kém"];
    shuffle($rating_result);
@endphp
<div class="booking-rating">
    <h3 class="title">Đánh giá</h3>
    <div class="mobile-rating">
        <div class="rating-mobile-1">
            <div class="rating-1">
                <div class="rating" style="background: conic-gradient(#0FD200 {{$hotel->rating/5 * 100}}%, #0000002b 0 100%);">
                    <div class="total-rating">
                        <b>{{$hotel->rating}}</b>
                        <p>{{$rating_result[0]}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rating-mobile-2">
            <div class="rating-info table-responsive m-0">
                <table class="">
                    <tbody>
                    <tr>
                        <td class="td-title" width="10%">Vị trí</td>
                        <td>
                            <div class="rating-percent"><span style="width: {{$hotel->rating_address/5 * 100}}%"></span>
                            </div>
                        </td>
                        <td class="pl-3 td-title">{{$hotel->rating_address}}</td>
                    </tr>
                    <tr>
                        <td class="td-title" width="10%">Giá cả</td>
                        <td>
                            <div class="rating-percent"><span style="width: {{$hotel->rating_price/5 * 100}}%"></span>
                            </div>
                        </td>
                        <td class="pl-3 td-title">{{$hotel->rating_price}}</td>
                    </tr>
                    <tr>
                        <td class="td-title" width="10%">Phục vụ</td>
                        <td>
                            <div class="rating-percent"><span style="width: {{$hotel->rating_service/5 * 100}}%"></span>
                            </div>
                        </td>
                        <td class="pl-3 td-title">{{$hotel->rating_service}}</td>
                    </tr>
                    <tr>
                        <td class="td-title" width="10%">Vệ sinh</td>
                        <td>
                            <div class="rating-percent"><span style="width: {{$hotel->rating_toilet/5 * 100}}%"></span>
                            </div>
                        </td>
                        <td class="pl-3 td-title">{{$hotel->rating_toilet}}</td>
                    </tr>
                    <tr>
                        <td class="td-title" width="10%">Tiện nghi</td>
                        <td>
                            <div class="rating-percent"><span style="width: {{$hotel->rating_convenient/5 * 100}}%"></span>
                            </div>
                        </td>
                        <td class="pl-3 td-title">{{$hotel->rating_convenient}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <p class="rating-desc">“{{$hotel->rating_content}}”</p>
</div>
