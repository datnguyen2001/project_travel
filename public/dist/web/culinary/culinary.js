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

function SliderProduct() {
    $('.slider-product__slick').slick({
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

$(function () {
    SliderCategory();
    SliderProduct();
    $('.card-review-main.card-d-none').slice(0, 6).show();
    $('.btn-view-all').click(function (e) {
        $('.card-review-main.card-d-none').show();
        $('.btn-view-all').hide();
        e.preventDefault();
    });
});
