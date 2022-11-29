$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".show-slide").click(function () {
        let data = {};
        data['room_id'] = $(this).val();
        data['parent_id'] = $(this).attr("data-value");
        $.ajax({
            url: window.location.origin + '/booking/slide',
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

    $(".btn-booking").click(function () {
        let data = {};
        data['room_id'] = $(this).val();
        $.ajax({
            url: window.location.origin + '/booking/show-room',
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if(data.status){
                    $(".popup-form").html(data.prop);
                    $(".popup-form").addClass("active");
                }else{
                    Swal.fire({
                        title: data.msg,
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: "Xác nhận!"
                    });
                }
            }
        });
    });
    $(document).on("click", ".close-form", function () {
        $(".popup-form").removeClass("active");
    });

    $(".show-utilities").click(function () {
        let data = {};
        data['id'] = $(this).val();
        $.ajax({
            url: window.location.origin + '/booking/show-utilities',
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if(data.status){
                    $(".popup-utilities").html(data.prop);
                    $(".popup-utilities").addClass("active");
                }else{
                    Swal.fire({
                        title: data.msg,
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: "Xác nhận!"
                    });
                }
            }
        });
    });
    $(document).on("click", ".close-popup", function () {
        $(".popup-utilities").removeClass("active");
    });





    $(".btn-booking-hotel").click(function () {
        let data = {};
        data['hotel_id'] = $(this).val();
        $.ajax({
            url: window.location.origin + '/booking/show-hotel',
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if(data.status){
                    $(".popup-form").html(data.prop);
                    $(".popup-form").addClass("active");
                }else{
                    Swal.fire({
                        title: data.msg,
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: "Xác nhận!"
                    });
                }
            }
        });
    });

    $(".btn-touring").click(function () {
        let data = {};
        data['hotel_id'] = $(this).val();
        $.ajax({
            url: window.location.origin + '/touring/show-tour',
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if(data.status){
                    $(".popup-form").html(data.prop);
                    $(".popup-form").addClass("active");
                }else{
                    Swal.fire({
                        title: data.msg,
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: "Xác nhận!"
                    });
                }
            }
        });
    });

});
