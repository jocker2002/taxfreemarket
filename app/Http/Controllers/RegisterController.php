<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request) {

        if (Auth::check()) {
            return redirect(route("user.private"));
        }

        $validateFields = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        if (User::where("email", $validateFields["email"])->exists()) {
            return redirect(route("user.register"))->withErrors([
                "email" => "This user is already registered"
            ]);
        }

        $user = User::create($validateFields);
        
        $user->assignRole("consumer");

        if ($user) {
            Auth::login($user);
            return redirect(route("user.private"));
        }

        return redirect(route("user.signin"))->withErrors([
            "formError" => "An error occurred while registering the user"
        ]);
    }
}
