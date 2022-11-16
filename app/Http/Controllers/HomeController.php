<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index($type='admin')
    {
        return view('auth.login',compact('type'));
    }
    public function home()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('layouts.admin.app');
    }
}
