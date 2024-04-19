<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AysController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('home');
    }

}
