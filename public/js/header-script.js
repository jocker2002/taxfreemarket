$(document).ready(function() {

    $("header").height($(".header").outerHeight());

    if (window.location.pathname != "/") {
        $(".header").css("position", "fixed");
    }

    if ($(".search-input").val()) {
        $(".search-action").prop("disabled", false);
    }

    /*
    $(".search-input").on('input', function() {

        if ($(this).val()) {
            $(".search-action").prop("disabled", false);
        } else {
            $(".search-action").prop("disabled", true);
        }

    });
    */

    /*
    var $data_cat = "";

    $(".dropbtn").on("mouseenter", function() {
        $(".dropdown-content").show();
        $data_cat = $(this).data("cat");
        $(".dropdown-content ul[data-cat='" + $data_cat + "']").show();
    });


    $(document).on("mouseover", function(event) {
        console.log("hi!");
        if (event.target.getAttribute("data-cat") != $data_cat) {
            $(".dropdown-content").hide();
            $(".dropdown-content ul[data-cat='" + $data_cat + "']").hide();
        }
    })

    */
    /*
    

    $("header").on("mouseout", function() {
        $(".dropdown-content").fadeOut(150);
    });
    */

    /*
    $.fn.AlignDroppedMenu = function() {
        $(".dropped-menu").css({
            "top": $(".header-region").offset().top,
            "left": $(".header-region").offset().left,
            "transform": "translate(-42.5%, 45px)"
        });
    }

    $(".header-region").click(function() {
        if ($(".dropped-menu").is(":hidden")) {
            $(".dropped-menu").fadeIn(200);
            $.fn.AlignDroppedMenu();
        } else {
            $(".dropped-menu").fadeOut(200);
        }
    });

    $(window).on('resize', function() {
        $.fn.AlignDroppedMenu()
    });


    $(document).on("click", function(event) {
        if (!(event.target.className == "header-region") && !(event.target.className == "dropped-menu") && $(".dropped-menu").has(event.target).length === 0) {
            $(".dropped-menu").fadeOut();
        }
    });
    */

});