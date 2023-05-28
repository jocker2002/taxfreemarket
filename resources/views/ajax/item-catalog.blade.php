@foreach($items as $item) // nolasīt katru produktu

// uzstādīt noklusējuma attēlu
@php
$picture = "";
if(count($item->pictures) > 0) {
$picture = $imgBase."/".$item->pictures[0]["url"];
} else {
$picture = "/img/no-image.svg";s
}
@endphp


<div class="item p-5 col-xs-4 col-sm-3 col-sm-2" onclick="location.href='/item/{{$item->item_id}}'">

    <div class="image">
        <img src={{$picture}} alt="Picture">
    </div>

    <span class="item-title">{{$item->name}}</span> // izvadīt produkta nosaukumu
    <span><small>Brand:&nbsp</small><b>{{$item->brand}}</b></span> // izvadīt produkta zīmolu
    <span><small>Category:&nbsp</small><b>{{$item->attribute->where("name", "category")->value("value")}}</b></span> // izvadīt produkta kategoriju
    <span><small>Quantity:&nbsp</small><b>{{$item->availability}}</b></span> // izvadīt produkta skaitu
    <span><small>Made in:&nbsp</small><b>{{$item->madein}}</b></span> // izvadīt produkta ražotājvalstu
    <span class="price-retail">Price: <span class="price-value">{{$item->sellPrice}}&nbsp{{$item->currency}}</span> // izvadīt produkta cenu
</div>
@endforeach

