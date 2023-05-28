$(document).ready(function() {

    /*
    $(".category-heading").on("click", function() {
        var categoryID = $(this).parent().attr("id");

        if ($("#" + categoryID + " .category-list").is(":visible")) {
            $("#" + categoryID + " .category-list").slideUp(400);
            $("#" + categoryID + " .category-heading .arrow").css("transform", "rotate(180deg)");
        } else {
            $("#" + categoryID + " .category-list").slideDown(400);
            $("#" + categoryID + " .category-heading .arrow").css("transform", "rotate(0deg)");
        }
    });
    */

    $(".category-heading").on("click", function() {

        var $category_list = $(this).siblings(".category-list")
        var $heading_arrow = $(this).find(".arrow");

        if ($category_list.is(":visible")) {
            $category_list.slideUp(300);
            $heading_arrow.css("transform", "rotate(180deg)");
        } else {
            $category_list.slideDown(300);
            $heading_arrow.css("transform", "rotate(0deg)");
        }

    });
});