<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.layouts.index');
    }

    public function roles()
    {
        return view('admin.layouts.roles');
    }

    public function permissions()
    {
        return view('admin.layouts.permissions');
    }
}
