@extends('layouts.main')

@section('page_title', $item->name)

@section('page_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_css')
<link rel="stylesheet" href="/css/header/header-styles.css">
<link rel="stylesheet" href="/css/header/header-regular-styles.css">
<link rel="stylesheet" href="/css/footer-styles.css">
<link rel="stylesheet" href="/css/page-styles.css">
<link rel="stylesheet" href="/css/fancy-buttons.css">
<link rel="stylesheet" href="/css/search/item-styles.css">
<link rel="stylesheet" href="/css/search/item-image-styles.css">
<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }

    .quantity-block {
        margin-top: 15px;
        margin-left: 40px;
        font-size: 20px;
    }

    .quantity-arrow-minus,
    .quantity-arrow-plus {
        cursor: pointer;
        font-size: 20px;
        padding: 5px 12px;
        width: 40px;
        box-sizing: border-box;
        border-radius: 4px;
        outline: none;
        background-color: #fcdcca;
        border: 2px solid var(--main-orange);
        font-weight: bold;
    }

    .quantity-num {
        width: 50px;
        font-size: 20px;
        padding: 5px 10px;
        border-radius: 4px;
        outline: none;
        border: 2px solid var(--main-orange);
    }
</style>
@endsection

@section('page_libs')
<!-- jQuery -->
<script src="/libs/jquery-3.6.0.js"></script>
@endsection

@section('page_plugins')
<!-- JS Cookie Plugin -->
<script src="/plugins/js.cookie.js"></script>

<!-- Slick Plugin -->
<link rel='stylesheet' href='/plugins/slick-1.8.1/slick.css'>
<link rel='stylesheet' href='/plugins/slick-1.8.1/slick-theme.css'>
<script src='/plugins/slick-1.8.1/slick.js'></script>

<!-- xZoom Plugin -->
<link rel="stylesheet" type="text/css" href="/plugins/xZoom/xzoom.css" media="all" />
@endsection

@section('page_libs')
<script src="/libs/jquery-3.6.0.js"></script>
@endsection

@section('page_js')
<script src="/js/header-script.js"></script>
<script src="/js/item-image-script.js"></script>
<script>
    $(document).ready(function() {

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
                        $("#quantity-number").val(1);

                    },
                });

            }

        });


        $("#add-to-cart").on("click", function() {

            var model_size = $("#size").find(":selected").val();
            var model_color = $("#color").find(":selected").val();
            var model_price = $("#price span.index").text();
            var quantity = $("#quantity-number").val();

            $.ajax({
                url: "/item/{{ $item->item_id }}/action",
                type: "GET",
                data: {
                    item_id: "{{ $item->id }}",
                    item_api_id: "{{ $item->item_api_id }}",
                    size: model_size,
                    color: model_color,
                    price: model_price,
                    quantity: quantity,
                    action: "add-to-cart"
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(response) {

                    // Update cartNumber
                    $.ajax({
                        url: "{{ route('user.cart.action') }}",
                        type: "GET",
                        data: {
                            action: "update_cartNumber"
                        },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(number) {
                            $("#auth-cart .auth-notification span").text(number);
                        }
                    });


                    if (response["status"] == "error") {
                        $("#message-box").addClass("error")
                    }

                    if (response["status"] == "warning") {
                        $("#message-box").addClass("warning")
                    }

                    if (response["status"] == "success") {
                        $("#message-box").addClass("success")
                    }

                    $("#message-box span").text(response["message"]);
                    $("#message-box").slideDown(200);

                },
            });

        });

    });
</script>
@endsection


<?php
function unique_multidim_array($array, $key)
{
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach ($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
?>


@section('content_main')
<div class="content">
    <section class="item-information">
        <div class="image-container">
            <div class="row">
                <div class="column small-centered">
                    <div class="slider slider-single">
                        @php
                        $picture_count = count($item->pictures);
                        if ($picture_count > 0) {
                        foreach($item->pictures as $picture) {
                        $pic = $imgBase."/".$picture["url"];
                        @endphp
                        <div class="content-image">
                            <img src={{$pic}}>
                        </div>
                        @php
                        }
                        } else {
                        @endphp
                        <div class="content-image">
                            <img src="/img/no-image.svg">
                        </div>
                        @php
                        }
                        @endphp
                    </div>

                    <div class="slider slider-nav">
                        @if($picture_count > 1)
                        @php
                        foreach($item->pictures as $picture) {
                        $pic = $imgBase."/".$picture["url"];
                        @endphp
                        <div class="nav-image">
                            <img src={{$pic}}>
                        </div>
                        @php
                        }
                        @endphp
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="item-details">
            <div id="name">
                <h1>{{$item->name}}</h1>
                <hr>
            </div>
            <div class="details-container">
                <div class="details-container-left">
                    <div class="details-subcontainer">
                        <div class="labels">
                            <label for="brand">Brand:</label>
                            <label for="size">Size:</label>
                            <label for="color">Color:</label>
                            <label for="availability">Quantity:</label>
                            <label for="price">Price:</label>
                        </div>
                        <form class="details" id="item-form">
                            <span>{{$item->brand}}</span>
                            @php
                            $item_models = array();

                            foreach($item->model as $model) {
                            array_push($item_models, $model);
                            }
                            $item_models = unique_multidim_array($item_models, "size");
                            @endphp

                            <select id="size" name="size" required>
                                <option value="" disabled selected hidden>-- Select --</option>
                                @foreach($item_models as $model)
                                <option value="{{$model['size']}}">{{$model['size']}}</option>
                                @endforeach
                            </select>

                            <select id="color" name="color" disabled required>
                                <option value="" disabled selected hidden>-- Select --</option>
                            </select>

                            <span id="availability">{{$item->availability}}</span>

                            <div id="price">
                                <span class="index">{{number_format($item->sellPrice, 2, ',', ' ')}}</span>
                                <span class="currency">{{$item->currency}}</span>
                            </div>
                        </form>
                    </div>

                    <!--
                    <div id="quantity" style="margin-bottom: 20px; margin-left: 40px">
                        <div class="round-btn" id="minus-sign"></div>
                        <input type="number" id="quantity-number" form="item-form" max="7"/>
                        <div class="round-btn" id="plus-sign"></div>
                    </div>
                    -->

                    <div class="quantity-block">
                        <button class="quantity-arrow-minus"> - </button>
                        <input class="quantity-num" id="quantity-number" type="number" value="1" />
                        <button class="quantity-arrow-plus"> + </button>
                    </div>

                    <div class="buttons">
                        <button class="button-rounded" id="add-to-cart">Add to Cart</button>
                        <div id="message-box">
                            <span></span>
                        </div>
                    </div>

                </div>
                <div class="details-container-right">
                    <div id="description">
                        @php
                        print_r(htmlspecialchars_decode($item->description->where("localecode", "en_US")->value("description")));
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection