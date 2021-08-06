<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $all_users = User::all();
        $admin_users = [];
        $common_users = [];

        // 管理者ユーザーと一般ユーザーで分ける
        foreach ($all_users as $user) {
            $user->password = Crypt::decrypt($user->password);

            if ($user->admin === "0") {
                array_push($common_users, $user);
            } else {
                array_push($admin_users, $user);
            }
        }

        return view('User/user', ['common_users' => $common_users, 'admin_users' => $admin_users]);
    }

    public function create(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Crypt::encrypt($request->password);
        $user->admin = $request->admin;

        $user->save();

        $all_users = User::all();
        $admin_users = [];
        $common_users = [];

        // 管理者ユーザーと一般ユーザーで分ける
        foreach ($all_users as $user) {
            $user->password = Crypt::decrypt($user->password);

            if ($user->admin === "0") {
                array_push($common_users, $user);
            } else {
                array_push($admin_users, $user);
            }
        }

        return view('User/user_list_item', ['common_users' => $common_users, 'admin_users' => $admin_users]);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Crypt::encrypt($request->password);
        $user->admin = $request->admin;

        $user->save();

        $all_users = User::all();
        $admin_users = [];
        $common_users = [];

        // 管理者ユーザーと一般ユーザーで分ける
        foreach ($all_users as $user) {
            $user->password = Crypt::decrypt($user->password);

            if ($user->admin === "0") {
                array_push($common_users, $user);
            } else {
                array_push($admin_users, $user);
            }
        }

        return view('User/user_list_item', ['common_users' => $common_users, 'admin_users' => $admin_users]);
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();

        $all_users = User::all();
        $admin_users = [];
        $common_users = [];

        // 管理者ユーザーと一般ユーザーで分ける
        foreach ($all_users as $user) {
            $user->password = Crypt::decrypt($user->password);

            if ($user->admin === "0") {
                array_push($common_users, $user);
            } else {
                array_push($admin_users, $user);
            }
        }

        return view('User/user_list_item', ['common_users' => $common_users, 'admin_users' => $admin_users]);
    }
}
