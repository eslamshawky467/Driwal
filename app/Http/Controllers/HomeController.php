<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($type = 'admin')
    {
        return view('auth.login',compact('type'));
    }
    public function home()
    {
        return view('home');
    }
    public function dashboard()
    {
        // $admins = User::sortable()->paginate(5);
        return view('layouts.admin.app');
    }
}
