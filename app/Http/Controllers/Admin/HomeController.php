<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Order;

class HomeController extends Controller
{
    public function index() {

        $user_count = User::all()->count();
        $item_count = Item::all()->count();
        $order_count = Order::where("status", "processed")->count();


        return view("admin.home.index", [
            "user_count" => $user_count,
            "item_count" => $item_count,
            "order_count" => $order_count
        ]);
    }
}
