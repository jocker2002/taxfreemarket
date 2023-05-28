$(document).ready(function() {

    //$(".expand-box").css("left", Number($(".sidebar ul.menu li ul").width()) + Number(55) + "px");;

    // toggle sidebar menu
    $('#sidebar-title, #sidebar-bars').on('click', function() {
        $('#wrapper').toggleClass('toggle');
    });

    // init menu
    $('ul.menu li').each(function() {
        $(this).parent().find('li.parent a.employ').addClass('up');
        if ($(this).children('li.parent a.current').length > 0) {
            $(this).parent().find('ul.submenu').toggle();
            $(this).parent().find('li.parent a.employ').addClass('active down');
        }
    });

    // active menu
    $('ul.menu li a').on('click', function() {
        $(this).parent('li.parent').find('a.employ').toggleClass('active');
        $(this).parent().find('ul.submenu').slideToggle('fast');
        $(this).parent().find('ul.submenu ul.submenu').toggle();
    });

    // click transition
    $('a.employ').on('click', function() {
        $(this).addClass('transition');
        $(this).toggleClass('current rotate');
    });

    // expand-button
    $(".expand-button").on("click", function() {

        if ($(this).siblings(".expand-box").is(":hidden")) {
            $(this).siblings(".expand-box").fadeIn(200);
            $(this).addClass("active");
        } else {
            $(this).siblings(".expand-box").fadeOut(200);
            $(this).removeClass("active");
        }
    });

});