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
        <input type="text" name="name" value="{{ $order_item->quantity }}">
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