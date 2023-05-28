$("document").ready(function() {

    $(".slider-nav .slick-slide.slick-active").on("click", function() {

        /*
        $(".slider-single .slick-slide.slick-active .content-image img").addClass("xzoom");

        $(".slider-single .slick-slide.slick-active .content-image img").attr("id","xzoom-default");
        */

        console.log($(this).attr("class"));

    });


});