<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //admin user index
    public function indexAdmin()
    {
        return view('admin.user.admin.index');
    }
}
