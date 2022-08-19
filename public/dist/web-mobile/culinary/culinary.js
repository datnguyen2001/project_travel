$(function () {
    $('.card-review-main.card-d-none').slice(0, 6).show();
    $('.btn-view-all').click(function (e) {
        $('.card-review-main.card-d-none').show();
        $('.btn-view-all').hide();
        e.preventDefault();
    });
});
