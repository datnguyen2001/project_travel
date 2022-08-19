<div id="carouselExampleControls" class="carousel slide " data-ride="carousel" style="width: 850px; height: 600px; object-fit: cover;overflow: hidden">
    <button class="bg-transparent border-0 close-popup position-absolute p-0" style="top: 10px;right: 10px;z-index: 100">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-x-square-fill" viewBox="0 0 16 16" style="background-color: red; border-radius: 5px">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
        </svg>
    </button>
    <div class="carousel-inner">
        @foreach($multimedia as $key => $value)
        <div class="carousel-item @if($key == 0) active @endif">
            <img class="d-block w-100" src="{{$value->src}}" alt="First slide">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;padding: 30px 15px;"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;padding: 30px 15px;"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
