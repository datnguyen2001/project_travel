$(function () {
    $(".homeSlider").slick({
        autoplay: true,
        dots: true,
        infinite: true,
        speed: 500,
        lazyLoad: "ondemand",
        controls: false,
        prevArrow: false,
        nextArrow: false,
    });
    Slider();
    TabMenu1();
    TabMenu2();
    TabMenu3();
});

function TabMenu() {
    const indicator = document.querySelector(".nav-indicator");
    const items = document.querySelectorAll(".nav-item");

    function handleIndicator(el) {
        items.forEach((item) => {
            item.classList.remove("is-active");
            item.removeAttribute("style");
        });

        indicator.style.width = `${el.offsetWidth}px`;
        indicator.style.left = `${el.offsetLeft}px`;
        indicator.style.backgroundColor = el.getAttribute("active-color");

        el.classList.add("is-active");
        el.style.color = el.getAttribute("active-color");
    }

    items.forEach((item, index) => {
        item.addEventListener("click", (e) => {
            handleIndicator(e.target);
        });
        item.classList.contains("is-active") && handleIndicator(item);
    });

    // Show the first tab and hide the rest
    $("#tabs-nav li:first-child").addClass("active");
    $(".tab-content").hide();
    $(".tab-content:first").show();

    // Click function
    $(".nav .nav-item").click(function () {
        $(".nav .nav-item li").removeClass("is-active");
        $(this).addClass("is-active");
        $(".tab-content").hide();

        var activeTab = $(this).attr("href");
        $(activeTab).fadeIn();
        return false;
    });
}

function TabMenu1() {
    const indicator = document.querySelector(".nav-indicator-1");
    const items = document.querySelectorAll(".nav-item-1");

    function handleIndicator(el) {
        items.forEach((item) => {
            item.classList.remove("is-active");
            item.removeAttribute("style");
        });

        indicator.style.width = `${el.offsetWidth}px`;
        indicator.style.left = `${el.offsetLeft}px`;
        indicator.style.backgroundColor = el.getAttribute("active-color");

        el.classList.add("is-active");
        el.style.color = el.getAttribute("active-color");
    }

    items.forEach((item, index) => {
        item.addEventListener("click", (e) => {
            handleIndicator(e.target);
        });
        item.classList.contains("is-active") && handleIndicator(item);
    });

    // Show the first tab and hide the rest
    $("#tabs-nav li:first-child").addClass("active");
    $(".tab-content-1").hide();
    $(".tab-content-1:first").show();

    // Click function
    $(".nav .nav-item-1").click(function () {
        $(".nav .nav-item-1 li").removeClass("is-active");
        $(this).addClass("is-active");
        $(".tab-content-1").hide();

        var activeTab = $(this).attr("href");
        $(activeTab).fadeIn();
        return false;
    });
}

function TabMenu2() {
    const indicator = document.querySelector(".nav-indicator-2");
    const items = document.querySelectorAll(".nav-item-2");

    function handleIndicator(el) {
        items.forEach((item) => {
            item.classList.remove("is-active");
            item.removeAttribute("style");
        });

        indicator.style.width = `${el.offsetWidth}px`;
        indicator.style.left = `${el.offsetLeft}px`;
        indicator.style.backgroundColor = el.getAttribute("active-color");

        el.classList.add("is-active");
        el.style.color = el.getAttribute("active-color");
    }

    items.forEach((item, index) => {
        item.addEventListener("click", (e) => {
            handleIndicator(e.target);
        });
        item.classList.contains("is-active") && handleIndicator(item);
    });

    // Show the first tab and hide the rest
    $("#tabs-nav li:first-child").addClass("active");
    $(".tab-content-2").hide();
    $(".tab-content-2:first").show();

    // Click function
    $(".nav .nav-item-2").click(function () {
        $(".nav .nav-item-2 li").removeClass("is-active");
        $(this).addClass("is-active");
        $(".tab-content-2").hide();

        var activeTab = $(this).attr("data-href");
        var slide = activeTab + " .slider-genre__slick";
        $(activeTab).fadeIn();
        $(slide).slick("refresh");
    });
}

function TabMenu3() {
    const indicator = document.querySelector(".nav-indicator-3");
    const items = document.querySelectorAll(".nav-item-3");

    function handleIndicator(el) {
        items.forEach((item) => {
            item.classList.remove("is-active");
            item.removeAttribute("style");
        });

        indicator.style.width = `${el.offsetWidth}px`;
        indicator.style.left = `${el.offsetLeft}px`;
        indicator.style.backgroundColor = el.getAttribute("active-color");

        el.classList.add("is-active");
        el.style.color = el.getAttribute("active-color");
    }

    items.forEach((item, index) => {
        item.addEventListener("click", (e) => {
            handleIndicator(e.target);
        });
        item.classList.contains("is-active") && handleIndicator(item);
    });

    // Show the first tab and hide the rest
    $("#tabs-nav li:first-child").addClass("active");
    $(".tab-content-3").hide();
    $(".tab-content-3:first").show();

    // Click function
    $(".nav .nav-item-3").click(function () {
        $(".nav .nav-item-3 li").removeClass("is-active");
        $(this).addClass("is-active");
        $(".tab-content-3").hide();

        var activeTab = $(this).attr("href");
        var slide = activeTab + " .slider-genre__slick";
        $(activeTab).fadeIn();
        $(slide).slick("refresh");
        return false;
    });
}

function Slider() {
    $(".slider-genre__slick").each(function () {
        $(this).slick({
            infinite: false,
            dots: false,
            speed: 800,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow:
                '<button class="prev-arrow" aria-label="prev-arrow" name="prev-arrow"><i class="fal fa-chevron-left"></i></button>',
            nextArrow:
                '<button class="next-arrow" aria-label="next-arrow" name="next-arrow"><i class="fal fa-chevron-right"></i></button>',
            centerMode: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
}
