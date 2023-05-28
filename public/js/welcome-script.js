$(document).ready(function() {

    $(".shift-button").click(function() {

        if ($(".shift-button").text() == "Register!") {
            $("#form-sign-in, .welcome-form h1, .welcome-form h2, .shift-button span").fadeOut(200, function() {
                $("#choose-yourself, .welcome-form h1, .welcome-form h2, .shift-button span").fadeIn(200);
                $(".welcome-form h1").text("Choose yourself!");
                $(".welcome-form h2").text("Do you have an account?");
                $(".shift-button span").text("Sign In!");
            });
        } else {
            $("#choose-yourself, .welcome-form h1, .welcome-form h2, .shift-button span").fadeOut(200, function() {
                $("#form-sign-in, .welcome-form h1, .welcome-form h2, .shift-button span").fadeIn(200);
                $(".welcome-form h1").text("Start shopping now!");
                $(".welcome-form h2").text("Do not have an account yet?");
                $(".shift-button span").text("Register!");
            });
        }
    });

    $("#choose-yourself").height($("#form-sign-in").height());

    $("#choose-yourself button").attr("onclick", "window.location.href='/register'");

    $("#choose-yourself button").click(function() {
        Cookies.set("guest", $(this).val());
    });

    $(".your-store .blocks-autoplay").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        centerMode: true,
        centerPadding: '40px',
        autoplay: true,
        autoplaySpeed: 3000
    });

    $(".bitcoin-img").fitText(0.55);
});