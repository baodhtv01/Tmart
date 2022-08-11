<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    #region admin
    //admin user index
    public function indexAdmin()
    {
        //get all users role is admin in table many to many with role
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        return view('admin.user.admin.index', compact('users'));
    }
    #endregion

    #region user
    //user index
    public function indexUser()
    {
        //get all users role is user in table many to many with role
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        return view('admin.user.index', compact('users'));
    }
    #endregion

}
