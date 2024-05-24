<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function username()
    {
        return 'alias';
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'alias' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['alias' => $request->alias, 'password' => $request->password])) {
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'alias' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
