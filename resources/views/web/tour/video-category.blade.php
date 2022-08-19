@if(isset($category_travel->video))
<section class="video-category">
    <div class="container">
        <h3>Video khu nghỉ dưỡng</h3>
        <div class="list-image position-relative" style="padding-top: 50%">
            <video autoplay muted loop controls class="image-main img-culinary-big w-100 d-block position-absolute h-100" style="top: 0; left: 0;object-fit: cover">
                <source src="{{$category_travel->video}}" type="video/mp4">
            </video>
        </div>
    </div>
</section>
@endif
