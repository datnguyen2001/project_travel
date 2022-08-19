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
    SliderProduct();
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".show-slide").click(function () {
        let data = {};
        data['category_booth'] = $(this).val();
        $.ajax({
            url: window.location.origin + '/slide-mon-an',
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if(data.status){
                    $(".popup-slide").html(data.prop);
                    $(".popup-slide").addClass("active");
                }
            }
        });
    });
    $(document).on("click", ".close-popup", function () {
        $(".popup-slide").removeClass("active");
        $(".popup-slide").html("");
    });




});
