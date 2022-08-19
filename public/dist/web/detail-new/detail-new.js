$(function(){
    $('.card-review-main.card-d-none').slice(0, 3).show();
    $('.btn-view-all').click(function(e){
        $('.card-review-main.card-d-none').show();
        $('.btn-view-all').hide();
        e.preventDefault();
    });
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".show-slide").click(function () {
        let data = {};
        data['category'] = $(this).val();
        $.ajax({
            url: window.location.origin + '/slide-news',
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
