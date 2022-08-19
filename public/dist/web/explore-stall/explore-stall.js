$(function () {
    SliderCategory();
    SliderTopFamous();
    SliderWhatDoEatHere();
});
function SliderCategory() {
    $('.slider-category__slick').slick({
        infinite: true,
        autoplay: true,
        dots: false,
        speed: 800,
        slidesToShow: 5,
        slidesToScroll: 2,
        prevArrow: '<button class="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fal fa-chevron-right"></i></button>',
        centerMode: false,
    })
}
function SliderTopFamous() {
    $('.slider-top-famous__slick').slick({
        infinite: true,
        autoplay: true,
        dots: false,
        speed: 800,
        slidesToShow: 4,
        slidesToScroll: 2,
        prevArrow: '<button class="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fal fa-chevron-right"></i></button>',
        centerMode: false,
    })
}
function SliderWhatDoEatHere() {
    $('.slider-what-do-eat-here__slick').slick({
        infinite: true,
        autoplay: true,
        dots: false,
        speed: 800,
        slidesToShow: 4,
        slidesToScroll: 2,
        prevArrow: '<button class="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fal fa-chevron-right"></i></button>',
        centerMode: false,
    })
}
