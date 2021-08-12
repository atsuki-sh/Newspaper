<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAjaxController extends Controller
{
    public function sendUserData()
    {
        return view('User/user_list_item', ['users' => User::all()]);
    }

    public function sendAllUserList()
    {
        $users = User::all();

        return view('User/user_list_item', ['users' => $users]);
    }

    public function sendAdminUserList()
    {
        $users = User::where('admin', 1)->get();

        return view('User/user_list_item', ['users' => $users]);
    }

    public function sendCommonUserList()
    {
        $users = User::where('admin', 0)->get();

        return view('User/user_list_item', ['users' => $users]);
    }
}
