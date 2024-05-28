<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'clearance' => 'required|integer|min:1',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $formal_name = $request->firstname . ' ' . $request->lastname;

        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'name' => $formal_name,
            'alias' => $request->alias,
            'email' => $request->email,
            'clearance' => $request->clearance,
            'password' => Hash::make($request->password),
            'formal_name' => $formal_name,
        ]);

        Auth::login($user);

        return redirect('home');
    }
}
