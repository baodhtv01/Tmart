<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //index
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }
}
