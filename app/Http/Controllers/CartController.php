<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_Item;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            if (Order::where([["status", "cart"], ["user_id", Auth::id()]])->exists()) {

                $order = Order::where([["status", "cart"], ["user_id", Auth::id()]])->first();
                $order_items = Order_Item::where("order_id", $order->id)->orderBy("id", "desc")->get();

                if (count($order_items) == 0) {
                    Order::where([["status", "cart"], ["user_id", Auth::id()]])->delete();
                }
            } else {
                $order_items = 0;
            }

            return view("cart.index", [
                "order_items" => $order_items
            ]);
        }

        return redirect(route("user.signin"));
    }

    public function action(Request $request)
    {
        if (Auth::check() && $request->ajax()) {

            $order = Order::where([["status", "cart"], ["user_id", Auth::id()]])->first();
            $order_items = Order_Item::where("order_id", $order->id)->orderBy("id", "desc")->get();


            if ($request->action == "plus" || $request->action == "minus") {

                if ($request->action == "plus") {

                    $order_item = Order_Item::where("id", $request->id)->get();

                    $order_item[0]->quantity += 1;
                }

                if ($request->action == "minus") {

                    $order_item = Order_Item::where("id", $request->id)->get();

                    if ($order_item[0]->quantity <= 1) {

                        $request->action = "delete";
                        goto delete_action;
                    } else {
                        $order_item[0]->quantity -= 1;
                    }
                }

                $order_item[0]->save();

                return [
                    "quantity" => $order_item[0]->quantity,
                    "price-total" => number_format($order_item[0]->items[0]["sellPrice"] * $order_item[0]->quantity, 2, ',', ' ')
                ];
            }

            delete_action:

            if ($request->action == "delete") {
                Order_Item::where("id", $request->id)->delete();

                $order_items = Order_Item::where("order_id", $order->id)->orderBy("id", "desc")->get();

                if (count($order_items) == 0) {
                    Order::where([["status", "cart"], ["user_id", Auth::id()]])->delete();

                    return view("ajax.cart-empty")->render();
                }
            }

            $order_items = Order_Item::where("order_id", $order->id)->orderBy("id", "desc")->get();

            if ($request->action == "update_cartNumber") {
                return count($order_items);
            }

            if ($request->action == "price_final") {

                $price_final = 0;

                foreach ($order_items as $order_item) {
                    $price_final += $order_item->items[0]["sellPrice"] * $order_item->quantity;
                }

                $order->price_final = $price_final;
                $order->save();

                return number_format($price_final, 2, ',', ' ');
            }

            return view("ajax.cart", [
                "order_items" => $order_items
            ])->render();
        }

        return redirect(route("user.signin"));
    }

    public function checkout(Request $request) {
        if (Auth::check()) {

            Order::where("id", $request->order_id)->update([
                "price_final" => $request->price_final,
                "status" => "processed"
            ]);

        }
        return redirect(route("user.signin"));
    }
}
