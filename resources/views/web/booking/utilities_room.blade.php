<div id="carouselExampleControls" class="carousel slide w-75 item-room position-relative" data-ride="carousel">
    <button class="bg-transparent border-0 close-popup position-absolute p-0" style="top: 10px;right: 10px;z-index: 100">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-x-square-fill" viewBox="0 0 16 16" style="background-color: red;border-radius: 5px">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
        </svg>
    </button>
    <div class="mt-2">
        <p class="text-center text-info">Tiện ích khách sạn</p>

        <div style="display: flex; flex-wrap: wrap;justify-content: space-evenly" class="utiliti-room">

            @foreach($room_convenient as $key =>$item)
                <div class="d-flex align-items-center mb-3 ml-1 mr-1 active room-util">
                    <img class="d-block img-utiliti" src="{{$item->icon_convenient}}" alt="First slide" style="width: 30px;height: 30px">
                    <span class="other-info__title name-utiliti" style="margin-left: 10px">{{$item->name_convenient}}</span>
                </div>
            @endforeach

        </div>
    </div>
</div>
