$(document).ready(function() {

    /*
    if (jQuery.type(Cookies.get("guest")) == "undefined") {
        $(".form-container").hide();
    }
    */

    if (jQuery.type(Cookies.get("guest")) != "undefined") {

        if (Cookies.get("guest") == "physical-retailer") {
            $(".register-container").addClass("background-physical-retailer");
            $(".checkbox-container input[type='checkbox']").prop("checked", false);
        }

        if (Cookies.get("guest") == "juridic-retailer") {
            $(".checkbox-container input[type='checkbox']").prop("checked", true);
            $(".form-juridic-retailer").show();
            $(".register-container").addClass("background-juridic-retailer");
        }

        if (Cookies.get("guest") == "brand") {
            $("#form-retailer").hide();
            $("#form-brand").show();
            $(".register-container").addClass("background-brand");
            $(".nav-retailer").removeClass("register-active");
            $(".nav-brand").addClass("register-active");
            $(".register-slider").css({
                transition: "0ms",
                transform: "translate(" + $(".register-nav .nav-brand").position().left + "px)"
            });
        }

        $(".form-container input[name='select-country']").click(function() {
            $(this).val();
        });
    }

    /* Register-Nav Slider */

    $.fn.SetSliderWidth = function() {
        $(".register-slider").width($(".register-nav button").outerWidth());
    };

    $.fn.SetSliderWidth();

    $(".register-nav button").on("click", function() {
        $(".register-nav button").removeClass("register-active")
        $(this).addClass("register-active");
        $(".register-slider").css({
            transition: "400ms",
            transform: "translate(" + $(".register-nav button.register-active").position().left + "px)"
        });
    });

    $(window).resize(function() {
        $.fn.SetSliderWidth();
        $(".register-slider").css({
            transition: "0ms",
            transform: "translate(" + $(".register-nav button.register-active").position().left + "px)"
        });
    });

    /* Register-Nav Toggle */

    $(".nav-brand").on("click", function() {
        if (!$("#form-brand").is(":visible")) {
            $("#form-retailer").hide();
            $("#form-brand").show();
        }
    });

    $(".nav-retailer").on("click", function() {
        if (!$("#form-retailer").is(":visible")) {
            $("#form-retailer").show();
            $("#form-brand").hide();
        }
    });

    /* Juridic Retailer Form */

    if (!$(".checkbox-container input[type='checkbox']").is(":checked")) {
        $(".form-juridic-retailer").hide();
    }

    $(".checkbox-container span").on("click", function() {
        if ($(".checkbox-container input[type='checkbox']").is(":checked")) {
            $("#form-retailer .section-subtitle").text("Physical Retailer");
            $(".form-juridic-retailer").slideUp(400);
        } else {
            $("#form-retailer .section-subtitle").text("Juridic Retailer");
            $(".form-juridic-retailer").slideDown(400);
        }

    });

    /* Brand Form */


});