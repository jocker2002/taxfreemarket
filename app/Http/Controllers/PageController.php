<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function openPage_welcome() {
        return view('pages.welcome');
    }

    public function openPage_register() {
        return view('pages.register');
    }

    public function openPage_storeEditor() {
        return view('pages.store.welcome');
    }

    public function openPage_categories() {
        return view('pages.search.categories');
    }

}
