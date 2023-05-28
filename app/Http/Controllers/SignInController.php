<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function signin(Request $request) {
        
        if (Auth::check()) {
            return redirect()->intended(route("user.private"));
        }

        $formFiels = $request->only(["email", "password"]);

        if (Auth::attempt($formFiels)) {
            return redirect()->intended(route("user.private"));
        }

        return redirect(route("user.signin"))->withErrors([
            "email" => "Failed to sign in!"
        ]);
    }
}
