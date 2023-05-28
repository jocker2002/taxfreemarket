@extends('layouts.search')

@section('page_title', 'Search')

@section('page_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_css')

<link rel="stylesheet" href="/css/header/header-styles.css">
<link rel="stylesheet" href="/css/header/header-regular-styles.css">
<link rel="stylesheet" href="/css/footer-styles.css">
<link rel="stylesheet" href="/css/page-styles.css">
<link rel="stylesheet" href="/css/search/search-styles.css">
<link rel="stylesheet" href="/css/category-list-styles.css">

<link rel="stylesheet" href="/css/sidebar/sidebar.menu.css">
<link rel="stylesheet" href="/css/sidebar/sidebar.menu.white.css">
<link rel="stylesheet" href="/css/sidebar/sidebar.menu.dark.css">

<link rel="stylesheet" href="/css/checkbox-styles.css">
<style>
    nav[aria-label="Pagination Navigation"] {
        position: absolute;
        bottom: -40px;
    }

    nav[aria-label="Pagination Navigation"] svg {
        width: 20px;
        height: 20px;
    }

    nav[aria-label="Pagination Navigation"] .justify-between {
        margin-top: 40px;
    }

    footer {
        margin-top: 70px;
    }

    #wrapper {
        width: 80%;
        margin: auto;
    }
</style>
@endsection

@section('page_libs')
<!-- jQuery Library -->
<script src="/libs/jquery-3.6.0.js"></script>
@endsection

@section('page_plugins')
<!-- Cookie Plugin -->
<script src="/plugins/js.cookie.js"></script>
@endsection

@section('page_js')
<script src="/js/header-script.js"></script>
<script src="/js/sidebar-script.js"></script>
<script src="/js/item-catalog-script.js"></script>
<script>
    $(document).ready(function() {
        $(".setting-option.order-by").on("click", function() {
            /*
            var new_url;
            window.open("/", "_self");
            */


            /*
            var data_sort = $(this).data("sort");
            var data_order = $(this).data("order")

            if (data_order == "" || data_order == "desc") {
                $(this).data("order", "asc");
            } else if (data_order == "asc") {
                $(this).data("order", "desc");
            }

            var data_order = $(this).data("order");

            $.ajax({
                url: "{{ route('showItems') }}",
                type: "GET",
                data: {
                    sort: data_sort,
                    order: data_order
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    $(".catalog").html(data);

                    var $this = $(".order-by[data-sort='" + data_sort + "']");

                    if (data_order == "asc") {
                        $this.find(".order-arrows").css({
                            "background-image": `url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 490 490"><g><polygon points="85.877,154.014 85.877,428.309 131.706,428.309 131.706,154.014 180.497,221.213 217.584,194.27 108.792,44.46 0,194.27 37.087,221.213" fill="rgb(255,120,46)"/><polygon points="404.13,335.988 404.13,61.691 358.301,61.691 358.301,335.99 309.503,268.787 272.416,295.73 381.216,445.54 490,295.715 452.913,268.802" fill="gray"/></g></svg>')`
                        });
                    }

                    if (data_order == "desc") {
                        $this.find(".order-arrows").css({
                            "background-image": `url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 490 490"><g><polygon points="85.877,154.014 85.877,428.309 131.706,428.309 131.706,154.014 180.497,221.213 217.584,194.27 108.792,44.46 0,194.27 37.087,221.213" fill="gray"/><polygon points="404.13,335.988 404.13,61.691 358.301,61.691 358.301,335.99 309.503,268.787 272.416,295.73 381.216,445.54 490,295.715 452.913,268.802" fill="rgb(255,120,46)"/></g></svg>')`
                        });
                    }

                    $this.siblings(".setting-option.order-by").data("order", "");

                    $this.siblings(".setting-option.order-by").find(".order-arrows").css({
                        "background-image": `url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 490 490"><g><polygon points="85.877,154.014 85.877,428.309 131.706,428.309 131.706,154.014 180.497,221.213 217.584,194.27 108.792,44.46 0,194.27 37.087,221.213" fill="gray"/><polygon points="404.13,335.988 404.13,61.691 358.301,61.691 358.301,335.99 309.503,268.787 272.416,295.73 381.216,445.54 490,295.715 452.913,268.802" fill="gray"/></g></svg>')`
                    });

                    

                }
            });
            */

        });
    });
</script>
@endsection

<!--
    <div class="sidebar">
        <div id="product-categories" class="category-container">
            <div class="category-heading">
                Categories
                <div class="arrow"></div>
            </div>
            <ul class="category-list" style="display:flex;flex-direction:column">
                @foreach($categories as $category)
                <input type="checkbox" id="{{$category->value}}" name="{{$category->value}}"></input>
                    <label for="{{$category->value}}">{{$category->value}}</label>
                @endforeach
            </ul>
        </div>
        <div id="retail-price" class="category-container">
            <div class="category-heading">
                Retail Price
                <div class="arrow"></div>
            </div>
            <div class="category-list flex">
                <span>$</span>
                <input type="text" name="price-from" placeholder="From">
                <span>–</span>
                <input type="text" name="price-to" placeholder="To">
            </div>
        </div>
        <div id="filter" class="category-container">
            <div class="category-heading">
                Filter
                <div class="arrow"></div>
            </div>
            <ul class="category-list">
                <li>
                    <input type="checkbox" id="goods" name="goods"></input>
                    <label for="goods">Goods</label>
                </li>
                <li>
                    <input type="checkbox" id="stores" name="stores"></input>
                    <label for="stores">Stores</label>
                </li>
                <li>
                    <input type="checkbox" id="new-brands" name="new-brands"></input>
                    <label for="new-brands">New Brands</label>
                </li>
                <li>
                    <input type="checkbox" id="new-collections" name="new-collections"></input>
                    <label for="new-collections">New Collections</label>
                </li>
                <li>
                    <input type="checkbox" id="sale" name="sale"></input>
                    <label for="sale">Sale</label>
                </li>
            </ul>
        </div>
        <div id="min-order-value" class="category-container">
            <div class="category-heading">
                Minimum Order Value
                <div class="arrow"></div>
            </div>
            <ul class="category-list">
                <li>
                    <input type="radio" id="50-dollars" name="order-value" value="50-dollars"></input>
                    <label for="50-dollars">$50 or less</label>
                </li>
                <li>
                    <input type="radio" id="75-dollars" name="order-value" value="75-dollars"></input>
                    <label for="75-dollars">$75 or less</label>
                </li>
                <li>
                    <input type="radio" id="100-dollars" name="order-value" value="100-dollars"></input>
                    <label for="100-dollars">$100 or less</label>
                </li>
                <li>
                    <input type="radio" id="200-dollars" name="order-value" value="200-dollars"></input>
                    <label for="200-dollars">$200 or less</label>
                </li>
            </ul>
        </div>
        <div id="time-to-ship" class="category-container">
            <div class="category-heading">
                Time to ship
                <div class="arrow"></div>
            </div>
            <ul class="category-list">
                <li>
                    <input type="radio" id="3-days" name="ship-value" value="3-days"></input>
                    <label for="50-dollars">Within 3 days</label>
                </li>
                <li>
                    <input type="radio" id="5-days" name="ship-value" value="5-days"></input>
                    <label for="75-dollars">Within 5 days</label>
                </li>
                <li>
                    <input type="radio" id="8-days" name="ship-value" value="8-days"></input>
                    <label for="100-dollars">Within 8 days</label>
                </li>
                <li>
                    <input type="radio" id="11-days" name="ship-value" value="11-days"></input>
                    <label for="200-dollars">Within 11 days</label>
                </li>
            </ul>
        </div>
        <div id="brand-location" class="category-container">
            <div class="category-heading">
                Brand Location
                <div class="arrow"></div>
            </div>
            <ul class="category-list">
                <li>
                    <input type="checkbox" id="usa" name="usa"></input>
                    <label for="usa">United States</label>
                </li>

                <li>
                    <input type="checkbox" id="uk" name="uk"></input>
                    <label for="uk">United Kingdom</label>
                </li>
                <li>
                    <input type="checkbox" id="netherlands" name="netherlands"></input>
                    <label for="netherlands">Netherlands</label>
                </li>
                <li>
                    <input type="checkbox" id="belgium" name="belgium"></input>
                    <label for="belgium">Belgium</label>
                </li>
                <li>
                    <input type="checkbox" id="france" name="france"></input>
                    <label for="france">France</label>
                </li>
                <li>
                    <input type="checkbox" id="germany" name="germany"></input>
                    <label for="germany">Germany</label>
                </li>
                <li>
                    <input type="checkbox" id="spain" name="spain"></input>
                    <label for="spain">Spain</label>
                </li>
                <li>
                    <input type="checkbox" id="other" name="other"></input>
                    <label for="other">Other</label>
                </li>
            </ul>
        </div>
    </div>
    -->

@section("sidebar_menu")
<!-- sidebar menu -->
<div class="sidebar bg-white-2">
    <div class="menu">

        <!-- menu -->
        <ul class="menu scrollbar">

            <!-- dropdown menu -->
            <li>
                <span class="name">Filters</span>
                <ul>
                    <li class="parent">
                        <a href="#" class="employ active current "><i class="fa fa-cog" aria-hidden="true"></i>Category</a>
                        <ul class="submenu">
                            @foreach($categories as $category)
                            <li>
                                <!--
                                <label class="checkbox-container"><span>{{-- $category->value --}}</span>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                -->
                                <a href="/search/{{ $category->value }}">{{ $category->value }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
@endsection

@section('content_main')
<div class="content">
    <div class="container-fluid">
        <!--
        <div class="catalog-settings">
            <div class="setting-box">
                <span class="setting-title">Sort by:</span>
                <div class="setting-option-box">
                    <div class="setting-option order-by" data-sort="price">
                        <span>Price</span>
                        <div class="order-arrows"></div>
                    </div>
                    <div class="setting-option order-by" data-sort="name">
                        <span>Name</span>
                        <div class="order-arrows"></div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="catalog row g-2">

            @if (count($items) > 0)

            @foreach($items as $item)
            @php
            $picture = "";
            if(count($item->pictures) > 0) {
            $picture = $imgBase."/".$item->pictures[0]["url"];
            } else {
            $picture = "/img/no-image.svg";
            }
            @endphp

            <div class="p-2 col-xs-4 col-sm-3 col-sm-2">
                <a class="item " href='/item/{{$item->item_id}}'>

                    <div class="image">
                        <img src={{$picture}} alt="Picture">
                    </div>

                    <span class="item-title">{{$item->name}}</span>
                    <span><small>Brand:&nbsp</small><b>{{$item->brand}}</b></span>
                    <span><small>Category:&nbsp</small><b>{{$item->attribute->where("name", "category")->value("value")}}</b></span>
                    <span><small>Quantity:&nbsp</small><b>{{$item->availability}}</b></span>
                    <span><small>Made in:&nbsp</small><b>{{$item->madein}}</b></span>
                    <span class="price-retail">Price: <span class="price-value">{{$item->sellPrice}}&nbsp{{$item->currency}}</span></span>
                </a>
            </div>

            @endforeach

            @else
            <div class="no-results">
                <span>No matching results!</span>
            </div>
            @endif

        </div>
        {{$items->links()}}
    </div>
</div>

@endsection