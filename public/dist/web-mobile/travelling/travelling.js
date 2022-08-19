$(function(){
    SliderCategory();
    $('.card-review-main.card-d-none').slice(0, 6).show();
    $('.btn-view-all').click(function(e){
        $('.card-review-main.card-d-none').show();
        $('.btn-view-all').hide();
        e.preventDefault();
    });
});
function SliderCategory() {
    $(".slider-category__slick").each(function () {
        $(this).slick({
            infinite: true,
            autoplay: false,
            dots: false,
            speed: 800,
            slidesToShow: 5,
            slidesToScroll: 2,
            prevArrow:
                '<button class="prev-arrow" aria-label="prev-arrow" name="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
            nextArrow:
                '<button class="next-arrow" aria-label="next-arrow" name="next-arrow"><i class="fal fa-chevron-right"></i></button>',
            centerMode: false,
        });
    });
}
