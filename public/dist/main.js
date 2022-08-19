$(function () {
    const burgerMenu = document.getElementById("burger");
    const navbarMenu = document.getElementById("menu");

    // Show and Hide Navbar Menu
    burgerMenu.addEventListener("click", () => {
        burgerMenu.classList.toggle("is-active");
        navbarMenu.classList.toggle("is-active");

        if (navbarMenu.classList.contains("is-active")) {
            navbarMenu.style.maxHeight = navbarMenu.scrollHeight + "px";
            $('nav.navbar').css('background-color','grey');
        } else {
            navbarMenu.removeAttribute("style");
            $('nav.navbar').css('background-color','rgba(0, 0, 0, 0.1)');
        }
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 700) {
            $(".scroll-to-top").fadeIn();
        } else {
            $(".scroll-to-top").fadeOut();
        }
    });
    $(".scroll-to-top-button").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
