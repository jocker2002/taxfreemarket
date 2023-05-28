<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Item_Model;
use App\Models\Order;
use App\Models\Order_Item;


class ItemController extends Controller
{
    public function show($item_id)
    {
        $item = Item::where("item_id", $item_id)->first();

        return view("pages.search.item", ["item" => $item]);
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {

            if ($request->action == "size") {

                $model = Item_Model::where([
                    ["item_api_id", $request->item_api_id],
                    ["size", $request->size]
                ])->get("color");

                return $model;
            }

            if ($request->action == "color") {

                $model = Item_Model::where([
                    ["item_api_id", $request->item_api_id],
                    ["size", $request->size],
                    ["color", $request->color]
                ])->first();

                return [
                    "availability" => $model["availability"],
                    "price" => number_format($model["sellPrice"], 2, ',', ' ')
                ];
            }

            if ($request->action == "add-to-cart") {

                if (Auth::check()) {

                    if (empty($request->size)) {
                        return [
                            "status" => "warning",
                            "message" => "Size must be selected!"
                        ];
                    }

                    if (empty($request->color)) {
                        return [
                            "status" => "warning",
                            "message" => "Color must be selected!"
                        ];
                    }


                    if (!Order::where([["status", "cart"],["user_id", Auth::id()]])->exists()) {

                        $order = new Order;

                        $order->status = "cart";
                        $order->user_id = Auth::id();
                        $order->price_final = 0;
                        
                        $order->save();                       
                    }

                    $order = Order::where([["status", "cart"],["user_id", Auth::id()]])->first("id");
                    $order_id = $order->id;

                    $item_id = $request->item_id;

                    $item_model = Item_Model::where([
                        ["item_api_id", $request->item_api_id],
                        ["size", $request->size],
                        ["color", $request->color]
                    ])->first("id");
                    $item_model_id = $item_model->id;

                    $quantity = $request->quantity;

                    if (Order_Item::where([["order_id", $order_id],["item_id", $item_id],["item_model_id", $item_model_id]])->exists()) {

                        $order_item = Order_Item::where([
                            ["order_id", $order_id],
                            ["item_id", $item_id],
                            ["item_model_id", $item_model_id]
                        ])->first("quantity");

                        $quantity += $order_item->quantity;

                        $order_item = Order_Item::where([
                            ["order_id", $order_id],
                            ["item_id", $item_id],
                            ["item_model_id", $item_model_id]
                        ])->update(["quantity" => $quantity]);
                        
                        $message = array(
                            "status" => "success",
                            "message" => "Product quantity changed successfully!"
                        );
                        
                        
                    } else {
                        
                        Order_Item::create([
                            "order_id" => $order_id,
                            "item_id" => $item_id,
                            "item_model_id" => $item_model_id,
                            "quantity" => $quantity
                        ]);

                        $message = array(
                            "status" => "success",
                            "message" => "Product successfully added to cart!"
                        );
                        
                    }

                    /*
                    $price_total = floatval($request->price) * floatval($quantity);

                    $order = Order::where("id", $order_id)->first("price_final");
                    
                    $price_final = $price_total + floatval($order->price_final);                   

                    Order::where("id", $order_id)->update(["price_final" => $price_final]);

                    */

                    return $message;

                    
                }

                return [
                    "status" => "error",
                    "message" => "Sign in to add an item to your shopping cart!"
                ];
            }
        }
    }
}
