<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLogin(){
        return view('Admin.Auth.login');
    }

    public function index(){
        return view('Admin.index');
    }
}
