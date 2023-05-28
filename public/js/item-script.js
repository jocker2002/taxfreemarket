$("document").ready(function() {

    (function quantityProducts() {
        var $quantityArrowMinus = $(".quantity-arrow-minus");
        var $quantityArrowPlus = $(".quantity-arrow-plus");
        var $quantityNum = $(".quantity-num");

        $quantityArrowMinus.click(quantityMinus);
        $quantityArrowPlus.click(quantityPlus);

        function quantityMinus() {
            if ($quantityNum.val() > 1) {
                $quantityNum.val(+$quantityNum.val() - 1);
            }
        }

        function quantityPlus() {
            if ($quantityNum.val() < parseInt($("#availability").text()))
                $quantityNum.val(+$quantityNum.val() + 1);
        }
    })();

    // Select Size
    $("#size").on("change", function() {

        var model_size = $(this).find(":selected").val();

        if (typeof(model_size) != "undefined" && model_size !== null && model_size != "") {

            $.ajax({
                url: "/item/{{ $item->item_id }}/action",
                type: "GET",
                data: {
                    item_api_id: "{{ $item->item_api_id }}",
                    size: model_size,
                    action: "size"
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(models) {

                    $colors_html = '<option value="" disabled selected hidden>-- Select --</option>';

                    models.forEach(
                        (model) => $colors_html += '<option value="' + model["color"] + '">' + model["color"] + '</option>'
                    );

                    $("#color").html($colors_html);

                    $("#color").prop("disabled", false);
                },
            });
        }

    });

    // Select Color
    $("#color").on("change", function() {

        var model_size = $(this).siblings("#size").find(":selected").val();
        var model_color = $(this).find(":selected").val();

        if (typeof(model_color) != "undefined" && model_color !== null && model_color != "") {

            $.ajax({
                url: "/item/{{ $item->item_id }}/action",
                type: "GET",
                data: {
                    item_api_id: "{{ $item->item_api_id }}",
                    size: model_size,
                    color: model_color,
                    action: "color"
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(model) {

                    $("#availability").text(model["availability"]);
                    $("#price span.index").text(model["price"]);

                },
            });

        }

    });


    $("#add-to-cart").on("click", function() {

        var model_size = $("#size").find(":selected").val();
        var model_color = $("#color").find(":selected").val();
        var quantity = $("#quantity-number").val();

        console.log(model_size);
        console.log(model_color);
        console.log(quantity);

    });




    /* -- ZOOM IMAGE -- 

    $(".zoomed-img").css({
        "width": "calc(100% - " + $(".image-container").outerWidth(true) + "px",
        "left": $(".item-details").position().left
    });

    $(".zoom-lens").css({
        "width": $(".zoomed-img").width() / 4 + "px",
        "height": $(".zoomed-img").height() / 4 + "px",
    });

    $(window).on('resize', function() {
        $(".zoomed-img").css({
            "width": "calc(100% - " + $(".image-container").outerWidth(true) + "px",
        });

        $(".zoom-lens").css({
            "width": $(".zoomed-img").width() / 4 + "px",
            "height": $(".zoomed-img").height() / 4 + "px",
        });
    });

    $(".content-image").mouseover(function() {
        $(".zoom-lens").show();
        $(".zoomed-img").show();

    });

    $(".content-image").mousemove(function(cursor) {
        var cursorX = cursor.pageX - $(this).offset().left;
        var cursorY = cursor.pageY - $(this).offset().top;
        console.log("X: " + cursorX + " Y: " + cursorY);
        $(".zoom-lens").css({
            "left": cursorX - $(".zoom-lens").width() / 2,
            "top": cursorY - $(".zoom-lens").height() / 2
        });
    });

    $(".zoom-lens").mousemove(function(cursor) {
        var cursorX = cursor.pageX - $(".content-image").offset().left;
        var cursorY = cursor.pageY - $(".content-image").offset().top;
        $(this).css({
            "left": cursorX - $(".zoom-lens").width() / 2,
            "top": cursorY - $(".zoom-lens").height() / 2
        });
    });

*/



    /* -- QUANTITY -- */

    /*
    $("#quantity-number").val(1);

    $.fn.disableButton = function(element) {
        element.removeClass("active-btn");
        element.addClass("disabled-btn");

    }

    $.fn.activateButton = function(element) {
        element.removeClass("disabled-btn");
        element.addClass("active-btn");
        element.on("click");
    }

    $.fn.disableButton($("#minus-sign"))

    $.fn.activateButton($("#plus-sign"))

});

$("#minus-sign").on("click", function() {

    $("#quantity-number").val(function(index, currentValue) {
        if (!isNaN(currentValue) && currentValue > 1)
            return parseInt(--currentValue);
        else
            return 1;
    });

    if ($("#quantity-number").val() <= 1) {
        $.fn.disableButton($("#minus-sign"));
    }

});

$("#plus-sign").on("click", function() {

    $("#quantity-number").val(function(index, currentValue) {
        if (!isNaN(currentValue))
            return parseInt(++currentValue);
        else
            return 1;
    });

    if ($("#quantity-number").val() != 1) {
        $.fn.activateButton($("#minus-sign"));
    }

    */

});