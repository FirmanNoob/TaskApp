<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboards.index');
    }
    public function coba()
    {
        return view('admin.index');
    }
    public function profile()
    {
        return view('user.index');
    }
    public function login()
    {
        return view('auths.login');
    }
}
