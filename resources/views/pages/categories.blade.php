@extends('layouts.main')

@section('page_title', 'Categories')

@section('page_css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link rel="stylesheet" href="/css/header-styles.css">
<link rel="stylesheet" href="/css/header-regular-styles.css">
<link rel="stylesheet" href="/css/footer-styles.css">
<link rel="stylesheet" href="/css/page-styles.css">
<link rel="stylesheet" href="/css/search-styles.css">
<link rel="stylesheet" href="/css/category-list-styles.css">

<style>
    nav[aria-label="Pagination Navigation"] {
        position: absolute;
        bottom: -40px;
    }

    nav[aria-label="Pagination Navigation"] svg {
        width: 20px;
        height: 20px;
    }

    footer {
        margin-top: 100px;
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
<script src="/js/category-list-script.js"></script>
@endsection

@section('content_main')
<div class="content">

    <div class="catalog">
        @foreach($categories as $category)
        <div class="item">
            <div class="image">

            </div>
            <span class="item-title">{{$category->value}}</span>
        </div>
        @endforeach
    </div>

    {{--
        @foreach($items as $item)

        @php
        $picture = "";
        if(count($item->pictures) > 0) {
        $picture = $imgBase."/".$item->pictures[0]["url"];
        } else {
        $picture = "/img/no-image.svg";
        }
        @endphp


        <div class="item" onclick="location.href='/item/{{$item->item_id}}'">

    <div class="image">
        <img src={{$picture}} alt="Picture">
    </div>

    <span class="item-title">{{$item->name}}</span>
    <span><small>Brand:&nbsp</small><b>{{$item->brand}}</b></span>
    <span><small>Category:&nbsp</small><b>{{$item->attribute->where("name", "category")->value("value")}}</b></span>
    <span><small>Quantity:&nbsp</small><b>{{$item->availability}}</b></span>
    <span><small>Made in:&nbsp</small><b>{{$item->madein}}</b></span>
    <span class="price-retail">Price: <span class="price-value">{{$item->sellPrice}}&nbsp{{$item->currency}}</span></span>
</div>
@endforeach


</div>
{{$items->links()}}
--}}

</div>

@endsection