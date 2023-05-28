@extends('layouts.main')

@section('page_title', 'Cart')

@section('page_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_css')
<link rel="stylesheet" href="/css/header/header-styles.css">
<link rel="stylesheet" href="/css/header/header-regular-styles.css">
<link rel="stylesheet" href="/css/footer-styles.css">
<link rel="stylesheet" href="/css/page-styles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,500);

    * {
        box-sizing: border-box;
    }

    .shopping-cart {
        /*
        width: 750px;
        height: 423px;
        */
        width: 100%;
        height: fit-content;
        background: #FFFFFF;
        box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
        border-radius: 6px;
        display: flex;
        flex-direction: column;
    }

    .title {
        position: relative;
        display: flex;
        justify-content: space-between;
        height: 60px;
        border-bottom: 1px solid #E1E8EE;
        padding: 20px 30px;
        color: #5E6977;
        font-size: 18px;
        font-weight: 400;
        background-color: #fff0e8;
        border-radius: 6px 6px 0 0;
    }

    .title .cart-logo {
        position: absolute;
        top: 7.5px;
        right: 30px;
        width: 45px;
        height: 45px;
        background-image: url("/img/cart.svg");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }

    .item {
        display: flex;
        padding: 20px 30px;
        height: 161px;
        border-bottom: 1px solid #E1E8EE;
    }

    .item:last-child {
        border-bottom: none;
    }

    .item span.empty {
        margin: auto;
        font-size: 20px;
        color: #5E6977;
    }

    /* Buttons -  Delete and Like */

    .buttons {
        position: relative;
        padding-top: 30px;
        margin-right: 60px;
    }

    .delete-btn {
        display: inline-block;
        cursor: pointer;
        width: 18px;
        height: 17px;
        background: url("/img/shopping-cart/delete-icn.svg") no-repeat center;
        margin-right: 20px;
    }

    .like-btn {
        position: absolute;
        top: 9px;
        left: 15px;
        display: inline-block;
        background: url("/img/shopping-cart/twitter-heart.png");
        width: 60px;
        height: 60px;
        background-size: 2900%;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    .is-active {
        animation-name: animate;
        animation-duration: .8s;
        animation-iteration-count: 1;
        animation-timing-function: steps(28);
        animation-fill-mode: forwards;
    }

    @keyframes animate {
        0% {
            background-position: left;
        }

        50% {
            background-position: right;
        }

        100% {
            background-position: right;
        }
    }


    /* Product Image */

    .image {
        position: relative;
        width: 120px;
        height: 100%;
        padding: 5px;
        margin-right: 50px;
        border: 1px solid gainsboro;
        background-color: white;
        border-radius: 5px;
    }

    .image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }


    /* Product Description */

    .description {
        padding-top: 10px;
        margin-right: 60px;
        width: 115px;
    }

    .description .desc-element {
        display: flex;
        text-decoration: none;
    }

    .description span {
        display: block;
        font-size: 14px;
        color: #43484D;
        font-weight: 400;
    }

    .description .desc-element.item-name span {
        margin-bottom: 10px;
        font-size: 15px;
        font-weight: bold;
        transition: 100ms;
    }

    .description .desc-element.item-name span:hover {
        color: var(--main-orange);
    }

    .description .desc-element.item-brand span {
        margin-bottom: 2px;
    }

    .description .desc-element.item-model span {
        font-weight: 300;
        margin-top: 8px;
    }

    .description .desc-element.item-model span.label {
        color: #86939E;
    }


    /* Product Quantity */

    .quantity {
        padding-top: 20px;
        margin-right: 60px;
    }

    .quantity input {
        -webkit-appearance: none;
        border: none;
        text-align: center;
        width: 32px;
        font-size: 16px;
        color: #43484D;
        font-weight: 300;
    }

    button[class*=btn] {
        width: 30px;
        height: 30px;
        background-color: #E1E8EE;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: 100ms;
    }

    button[class*=btn]:hover {
        background-color: #d1dce5;
    }

    .minus-btn img {
        margin-bottom: 3px;
    }

    .plus-btn img {
        margin-top: 2px;
    }

    button:focus,
    input:focus {
        outline: 0;
    }


    /* Total Price */

    .price-total {
        padding-top: 27px;
        text-align: center;
        font-size: 16px;
        color: #43484D;
        font-weight: bold;
    }

    /* Final Price */

    .cart-footer {
        height: fit-content;
        color: black;
        font-size: 18px;
        border-radius: 0 0 6px 6px;
    }

    .cart-footer .price-final {
        background-color: #e8f8ff;
        height: 60px;
        border-bottom: 1px solid #E1E8EE;
        padding: 20px 30px;
        color: black;
        font-size: 18px;
    }

    .cart-footer .nav-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
        padding: 20px 30px;
    }

    .cart-footer .nav-buttons a,
    .cart-footer .nav-buttons button {
        padding: 10px 20px;
        color: white;
        border-radius: 20px;
        text-decoration: none;
        transition: 100ms;
        border: none;
        cursor: pointer;
        font-size: 18px;
    }

    .cart-footer .nav-buttons .continue {
        background-color: var(--main-orange);
    }

    .cart-footer .nav-buttons .continue:hover {
        background-color: #e66c29;
    }

    .cart-footer .nav-buttons .checkout {
        background-color: #29cf37;
    }

    .cart-footer .nav-buttons .checkout:hover {
        background-color: #23b02f;
    }

    .price-final span.index,
    .price-final span.currency {
        font-weight: bold;
        color: var(--main-orange);
    }

    /* Responsive */

    @media (max-width: 800px) {
        .shopping-cart {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .item {
            height: auto;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image img {
            width: 50%;
        }

        .image,
        .quantity,
        .description {
            width: 100%;
            text-align: center;
            margin: 6px 0;
        }

        .buttons {
            margin-right: 20px;
        }
    }
</style>
@endsection

@section('page_libs')
<script src="/libs/jquery-3.6.0.js"></script>
@endsection

@section('page_plugins')
<script src="/plugins/js.cookie.js"></script>
@endsection

@section('page_js')
<script src="/js/header-script.js"></script>

<script>
    $(document).ready(function() {
        $(".delete-btn").on("click", function() {

            var order_item_id = $(this).closest("div.item").data("order_item_id");

            $.ajax({
                url: "{{ route('user.cart.action') }}",
                type: "GET",
                data: {
                    id: order_item_id,
                    action: "delete"
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    $(".shopping-cart-list").html(data);

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

                    // Update Final Price
                    $.ajax({
                        url: "{{ route('user.cart.action') }}",
                        type: "GET",
                        data: {
                            action: "price_final"
                        },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(price) {
                            $(".price-final span.index").text(price);
                        }
                    });

                    location.reload();
                }
            });

        });


        $(".plus-btn").on("click", function() {

            var order_item_id = $(this).closest("div.item").data("order_item_id");
            var $input_quantity = $(this).siblings("input");

            $.ajax({
                url: "{{ route('user.cart.action') }}",
                type: "GET",
                data: {
                    id: order_item_id,
                    action: "plus"
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(plus) {
                    $input_quantity.val(plus["quantity"]);
                    $input_quantity.parent().siblings(".price-total").find("span.index").text(plus["price-total"]);

                    // Update Final Price
                    $.ajax({
                        url: "{{ route('user.cart.action') }}",
                        type: "GET",
                        data: {
                            action: "price_final"
                        },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(price) {
                            $(".price-final span.index").text(price);
                        }
                    });
                },
            });

        });

        $(".minus-btn").on("click", function() {

            var order_item_id = $(this).closest("div.item").data("order_item_id");
            var $input_quantity = $(this).siblings("input");

            $.ajax({
                url: "{{ route('user.cart.action') }}",
                type: "GET",
                data: {
                    id: order_item_id,
                    action: "minus"
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(minus) {

                    if (typeof minus == "string") {

                        $(".shopping-cart-list").html(minus);

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

                        location.reload();

                    } else {
                        $input_quantity.val(minus["quantity"]);
                        $input_quantity.parent().siblings(".price-total").find("span.index").text(minus["price-total"]);
                    }

                    // Update Final Price
                    $.ajax({
                        url: "{{ route('user.cart.action') }}",
                        type: "GET",
                        data: {
                            action: "price_final"
                        },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(price) {
                            $(".price-final span.index").text(price);
                        }
                    });

                },
            });

        });

        $(".checkout").on("click", function() {

            // Update Final Price
            $.ajax({
                url: "{{ route('user.cart.checkout') }}",
                type: "GET",
                data: {
                    order_id: $(this).data("order_id"),
                    price_final: parseFloat($.trim($(".price-final span.index").text()))
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    console.log(data);
                }
            });

        });
    });
</script>
@endsection

@section('content_main')
<div class="content">
    <div class="shopping-cart">

        <!-- Title -->
        <div class="title">
            <span>Your Shopping Cart</span>
            <div class="cart-logo"></div>
        </div>

        <!-- Products -->
        <div class="shopping-cart-list">
            @if (!empty($order_items))
            @foreach ($order_items as $order_item)
            <div class="item" data-order_item_id='{{ $order_item->id }}'>
                <div class="buttons">
                    <span class="delete-btn"></span>
                    <!--<span class="like-btn"></span>-->
                </div>

                <a class="image" href='/item/{{ $order_item->items[0]["item_id"] }}'>
                    <img src='{{ $imgBase . "/" . $order_item->items[0]->pictures[0]["url"] }}' alt="Picture" />
                </a>

                <div class="description">
                    <a class="desc-element item-name" href='/item/{{ $order_item->items[0]["item_id"] }}'>
                        <span>{{ $order_item->items[0]["name"] }}</span>
                    </a>
                    <div class="desc-element item-brand">
                        <span>{{ $order_item->items[0]["brand"] }}</span>
                    </div>
                    <div class="desc-element item-model">
                        <span class="label">Size:&nbsp</span>
                        <span class="index">{{ $order_item->item_models[0]["size"] }}</span>
                    </div>
                    <div class="desc-element item-model">
                        <span class="label">Color:&nbsp</span>
                        <span class="index">{{ $order_item->item_models[0]["color"] }}</span>
                    </div>
                </div>

                <div class="quantity">
                    <button class="minus-btn" type="button" name="button">
                        <img src="/img/shopping-cart/minus.svg" alt="" />
                    </button>
                    <input type="text" value="{{ $order_item->quantity }}">
                    <button class="plus-btn" type="button" name="button">
                        <img src="/img/shopping-cart/plus.svg" alt="" />
                    </button>
                </div>

                <div class="price-total">
                    <span class="index">{{ number_format($order_item->items[0]["sellPrice"] * $order_item->quantity, 2, ',', ' ') }}</span>
                    <span>{{ $order_item->items[0]["currency"] }}</span>
                </div>
            </div>
            @endforeach
            @else
            <div class="item">
                <span class="empty">Your cart is empty!</span>
            </div>
            @endif
        </div>

        <div class="cart-footer">


            @if (!empty($order_items))
            <div class="price-final">
                <span class="label">Final price:&nbsp</span>
                <span class="index">
                    {{ number_format($order_item->items[0]["sellPrice"] * $order_item->quantity, 2, ',', ' ') }}
                </span>
                <span class="currency">
                    {{ $order_item->items[0]["currency"] }}
                </span>
            </div>
            @endif
            <div class="nav-buttons">
                <a class="continue" href="/search">
                    <i class="fa-solid fa-angles-left"></i>
                    <span>Continue Shopping</span>
                </a>
                @if (!empty($order_items))
                <button class="checkout" data-order_id="{{ $order_item->order_id }}">
                    <span>Checkout</span>
                    <i class="fa-solid fa-angles-right"></i>
                </button>
                @endif
            </div>


        </div>
    </div>
</div>

@endsection