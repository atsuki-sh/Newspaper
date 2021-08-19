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

    public function sendUserList($admin)
    {;
        if ($admin === '100') {
            $users = User::all();
        } else {
            $users = User::where('admin', $admin)->paginate(10);
        }

        return view('User/user_list_item', ['users' => $users]);
    }

    public function searchUserData(Request $request)
    {
        $word = $request->input('word');
        $radio = $request->input('radio');

        if ($radio === '100') {
            $users = User::query();
        } elseif ($radio === '1') {
            $users = User::where('admin', 1);
        } else {
            $users = User::where('admin', 0);
        }

        $users = $users->where('name', $word)
            ->orWhere('email', $word)
            ->orWhere('phone', $word)
            ->paginate(10);

        return view('User/user_list_item', ['users' => $users]);
    }
}
