<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // dd($attributes);

        $user = User::create($attributes);
        // dd($user);

        Auth::login($user);


        return redirect('/books')->with('success', 'Registration successful!');
    }
}
