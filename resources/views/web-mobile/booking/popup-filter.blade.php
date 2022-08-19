<div class="modal fade" id="popup-filter" tabindex="-1" style="z-index: 1500000">
    <div class="modal-dialog modal-dialog-centered" style="width: 75%;margin: 0 auto">
        <div class="modal-content p-sm-4">
            <div class="modal-header pb-0 p-sm-0 border-0">
                <button style="border: none;background: none; text-align: right" type="button" class="btn-close" data-toggle="tooltip" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <form action="{{url($url)}}" class="block-filter mb-2">
                <div class="modal-body" style="height: 400px; overflow: auto">
                    <div class="block-filter-detail">
                        <div class="filter-header">
                            <h3 class="filter-title f-size">Bộ lọc</h3>
                            <a href="{{url($url)}}"><h3 class="filter-reset f-size">Xoá tất cả </h3></a>
                        </div>
                        <div class="filter-range">
                            <h3 class="filter-title f-size">Khoảng giá</h3>
                                <div>
                                    <div style="display: flex;align-items: center;margin-top: 10px">
                                        <input type="text" name="price-from" class="inp-price format-currency" style="width: 110px;font-size: 14px" placeholder="Từ">
                                        <span style="margin: 0 5px;font-style: normal;font-weight: 400;font-size: 1rem;color: #111827;">=></span>
                                        <input type="text" name="price-to" class="inp-price format-currency" style="width: 110px;font-size: 14px" placeholder="Đến">
                                    </div>
                                </div>
                        </div>
                        <div class="filter-quality">
                            <h3 class="filter-title f-size">Chất lượng</h3>
                            <div class="block-star">
                                <input class="input-star" @if(isset(request()->star) && in_array(5, request()->get('star'))) checked @endif name="star[]" value="5" type="checkbox">
                                <ul class="list-star">
                                    @for($i=0; $i<5; $i++)
                                        <li>
                                            <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="block-star">
                                <input class="input-star" @if(isset(request()->star) && in_array(4, request()->get('star'))) checked @endif name="star[]" value="4" type="checkbox">
                                <ul class="list-star">
                                    @for($i=0; $i<4; $i++)
                                        <li>
                                            <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="block-star">
                                <input class="input-star" @if(isset(request()->star) && in_array(3, request()->get('star'))) checked @endif name="star[]" value="3" type="checkbox">
                                <ul class="list-star">
                                    @for($i=0; $i<3; $i++)
                                        <li>
                                            <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="block-star">
                                <input class="input-star" @if(isset(request()->star) && in_array(2, request()->get('star'))) checked @endif name="star[]" value="2" type="checkbox">
                                <ul class="list-star">
                                    @for($i=0; $i<2; $i++)
                                        <li>
                                            <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="block-star">
                                <input class="input-star" @if(isset(request()->star) && in_array(1, request()->get('star'))) checked @endif name="star[]" value="1" type="checkbox">
                                <ul class="list-star">
                                    @for($i=0; $i<1; $i++)
                                        <li>
                                            <img class="" src="{{asset('images/booking/icon/star.svg')}}" alt="">
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <div class="filter-distance">
                            <h3 class="filter-title f-size">Khoảng cách</h3>
                            <div class="condition-item">
                                <input class="input-star" type="checkbox">
                                <div class="condition-desc" style="font-size: 14px">Gần đây nhất</div>
                            </div>
                            <div class="condition-item">
                                <input class="input-star" type="checkbox">
                                <div class="condition-desc" style="font-size: 14px"><2 kilomet</div>
                            </div>
                            <div class="condition-item">
                                <input class="input-star" type="checkbox">
                                <div class="condition-desc" style="font-size: 14px"><5 kilomet</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-filter f-size">Lọc</button>
                </div>
            </form>
        </div>
    </div>
</div>
