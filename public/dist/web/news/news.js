$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   featured_news(window.location.origin + '/tin-tuc/tin-noi-bat');
   explore_tourism(window.location.origin + '/tin-tuc/kham-pha-du-lich');
   culinary_discovery(window.location.origin + '/tin-tuc/kham-pha-am-thuc');
   function featured_news(url) {
       $.ajax({
          url: url,
          data: null,
          dataType: 'json',
          type: 'post',
          success: function (data) {
              $(".featured-news .data-items").html(data.prop);
              $(".loading").removeClass("active");
          }
       });
   }
   $(document).on( "click" ,".featured-news .pagination .page-link", function (ev) {
       ev.preventDefault();
       $(".featured-news .pagination .page-link").removeClass("active");
       $(this).addClass("active");
       let url = $(this).attr("href");
       if (url === undefined){}else {
           $(".loading").addClass("active");
           featured_news(url);
       }
   });
   function explore_tourism(url) {
       $.ajax({
           url: url,
           data: null,
           dataType: 'json',
           type: 'post',
           success: function (data) {
               $(".travel-discovery .data-items").html(data.prop);
               $(".loading").removeClass("active");
           }
       });
   }
    $(document).on( "click" ,".travel-discovery .pagination .page-link", function (ev) {
        ev.preventDefault();
        $(".travel-discovery .pagination .page-link").removeClass("active");
        $(this).addClass("active");
        let url = $(this).attr("href");
        if (url === undefined){}else {
            $(".loading").addClass("active");
            explore_tourism(url);
        }
    });
   function culinary_discovery(url) {
       $.ajax({
           url: url,
           data: null,
           dataType: 'json',
           type: 'post',
           success: function (data) {
               $(".culinary-discovery .data-items").html(data.prop);
               $(".loading").removeClass("active");
           }
       });
   }
    $(document).on( "click" ,".culinary-discovery .pagination .page-link", function (ev) {
        ev.preventDefault();
        $(".culinary-discovery .pagination .page-link").removeClass("active");
        $(this).addClass("active");
        let url = $(this).attr("href");
        if (url === undefined){}else {
            $(".loading").addClass("active");
            culinary_discovery(url);
        }
    });
});
