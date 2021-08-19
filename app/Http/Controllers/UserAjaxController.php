<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class UserAjaxController extends Controller
{
    public function sendUserData($id)
    {
        $user = User::find($id);

        return view('User/user_modal_item', ['user' => $user]);
    }

    public function sendAllUserList()
    {
        $users = User::all();

        return view('User/user_list_item', ['users' => $users]);
    }

    public function sendAdminUserList()
    {
        $users = User::where('admin', 1)->paginate(10);

        return view('User/user_list_item', ['users' => $users]);
    }

    public function sendCommonUserList()
    {
        $users = User::where('admin', 0)->paginate(10);

        return view('User/user_list_item', ['users' => $users]);
    }

    public function searchUserData(Request $request)
    {
        $word = $request->input('word');

        $users = User::where('name', $word)
            ->orWhere('email', $word)
            ->orWhere('phone', $word)
            ->paginate(10);

        return view('User/user_list_item', ['users' => $users]);
    }
}
