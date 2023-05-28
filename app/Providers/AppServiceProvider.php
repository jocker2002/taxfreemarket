<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Item_Attribute;
use App\Models\Api_Info;
use App\Models\Order;
use App\Models\Order_Item;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Europe/Riga');

        view()->composer('*', function ($view) {
            if (Auth::check()) {
                
                if (Order::where([["status", "cart"], ["user_id", Auth::id()]])->exists()) {

                    $order = Order::where([["status", "cart"], ["user_id", Auth::id()]])->first("id");
                    $order_items = Order_Item::where("order_id", $order->id)->get();
                    $number = count($order_items);
                } else {
                    $number = 0;
                }

                $view->with('cartNumber', $number);
            } else {
                $view->with('currentUser', null);
            }
        });

        View::share([
            "categories" => Item_Attribute::select("value")->distinct()->where("name", "category")->get(),
            "imgBase" => Api_Info::latest()->get()->value("imgBase")
        ]);
    }
}
