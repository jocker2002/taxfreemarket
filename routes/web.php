<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GuzzleController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SaveStoreController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Admin_ItemController;
use App\Http\Controllers\Admin\Admin_UserController;
use App\Http\Controllers\Admin\Admin_OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'openPage_welcome']);

Route::get('/api', [GuzzleController::class, 'API_Items_Download']);

Route::get('/upd', [ApiController::class, 'InsertItems_Json']);

Route::get('/editor', [PageController::class, 'openPage_storeEditor']);

Route::get('/savestore', [SaveStoreController::class, 'save_store']);

Route::get("/item/{item_id}", [ItemController::class, "show"]);

Route::get("/item/{item_id}/action", [ItemController::class, "action"]);

//User Private Page
Route::name("user.")->group(function () {

    Route::prefix("private")->group(function () {
        Route::view("/", "pages.private")->middleware("auth")->name("private");
        
        Route::get("/cart", [CartController::class, "index"]);
        Route::get("/cart/action", [CartController::class, "action"])->name("cart.action");
        Route::get("/cart/checkout", [CartController::class, "checkout"])->name("cart.checkout");
    });

    Route::get("/signin", function () {
        if (Auth::check()) {
            return redirect(route("user.private"));
        }
        return view("pages.signin");
    })->name("signin");

    Route::post("/signin", [SignInController::class, "signin"]);

    Route::get("/signout", function () {
        Auth::logout();
        return redirect("/");
    })->name("signout");

    Route::get("/register", function () {
        if (Auth::check()) {
            return redirect(route("user.private"));
        }
        return view("pages.register");
    })->name("register");

    Route::post("/register", [RegisterController::class, "save"]);
});

Route::get("/categories", [PageController::class, "openPage_categories"]);

Route::get('/search', [SearchController::class, 'show_items'])->name("showItems");

Route::get("/search/{category}", [SearchController::class, "show_category"])->name("showCategory");

// Admin Panel
Route::middleware(['role:admin'])->prefix('dashboard')->group(function () {
    Route::get("/", [HomeController::class, "index"])->name('admin.home'); // /dashboard

    Route::resource('item', Admin_ItemController::class);
    Route::resource('user', Admin_UserController::class);
    Route::resource('order', Admin_OrderController::class);

    Route::post("item/action", [Admin_ItemController::class, "action"])->name("admin.item.action");
    Route::post("user/action", [Admin_UserController::class, "action"])->name("admin.user.action");
    Route::post("order/action", [Admin_UserController::class, "action"])->name("admin.order.action");
});
