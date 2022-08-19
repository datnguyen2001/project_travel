@if(isset($category_travel->video))
<section class="video-category mobile">
    <div class="container">
        <h5 style="font-weight: 600">Video khu nghỉ dưỡng</h5>
        <div class="video-category">
            <video id="player-mobile" style="width: 100%;height: 198px" controls src="{{$category_travel->video}}"
                   type="video/mp4">
            </video>
        </div>
    </div>
</section>
@endif
