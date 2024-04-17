<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            "name" => ["required", "string", "min:3", "max:40"],
            "email" => 'required|email|unique:users,email',
            "password" => 'required|confirmed',

        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect('/')->with('success', 'created successfully');
    }
    public function login()
    {
        return view("auth.login");
    }


    public function authenticate(Request $request)
    {
        $validated = request()->validate([
            "email" => 'required|email',
            "password" => 'required',

        ]);

        if (auth()->attempt($validated)) {

            request()->session()->regenerate();

            return redirect('/')->with('success', 'logged in successfully');
        }


        return redirect('/')->withErrors([
            'email' => 'not match',
        ]);
    }
    public function logout()
    {
        auth()->logout();
        request()->session()->regenerate();
        return redirect('/')->with('success', 'logged out !!!');
    }
}
