let helpers = {
    addZeros: function (n) {
        return (n < 10) ? '0' + n : '' + n;
    }
};
function SliderTop() {
    let $slider = $('.slider-image__slick');
    $slider.each(function() {
        let $sliderParent = $(this).parent();
        $(this).slick({
            infinite: true,
            autoplay: true,
            dots: false,
            speed: 800,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button class="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
            nextArrow: '<button class="next-arrow"><i class="fal fa-chevron-right"></i></button>',
            centerMode: false,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        adaptiveHeight: true
                    }
                }
            ]
        });

        if ($(this).find('.item').length > 1) {
            $(this).siblings('.slides-numbers').show();
        }

        $(this).on('afterChange', function(event, slick, currentSlide){
            $sliderParent.find('.slides-numbers .active').html(helpers.addZeros(currentSlide + 1));
        });

        let sliderItemsNum = $(this).find('.slick-slide').not('.slick-cloned').length;
        $sliderParent.find('.slides-numbers .total').html(helpers.addZeros(sliderItemsNum));

    });
}

$(function () {
    SliderTop();
});
