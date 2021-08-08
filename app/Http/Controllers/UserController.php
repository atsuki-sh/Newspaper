<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 管理者ユーザーと一般ユーザーで分けるためのメソッド
    public function divideUsers()
    {
        $all_users = User::all();
        $common_users = [];
        $admin_users = [];

        foreach ($all_users as $user) {
            if ($user->admin === "0") {
                array_push($common_users, $user);
            } else {
                array_push($admin_users, $user);
            }
        }

        return [$all_users, $admin_users, $common_users];
    }

    public function index()
    {
        return view('User/user', ['users' => User::all()]);
    }

    public function indexRadio(Request $request)
    {
        $divided_users = $this->divideUsers();

        switch ($request->radio) {
            case "0":
                return view('User/user_list_item', ['users' => $divided_users[0]]);
            case "1":
                return view('User/user_list_item', ['users' => $divided_users[1]]);
            default:
                return view('User/user_list_item', ['users' => $divided_users[2]]);
        }
    }

    public function create(UserRequest $request)
    {
        $user = new User();
        // データを一括作成する
        foreach ($request->input('item') as $key => $data) {
            if ($key === 'password') {
                // パスワードは暗号化して保存
                $user->$key = bcrypt($data);
            } else if ($key === 'id' or $key === 'password_confirmation' or $key === 'radio') {
                continue;
            }
            else {
                $user->$key = $data;
            }
        }

        $user->save();

        $divided_users = $this->divideUsers();

        switch ($request->input('item.radio')) {
            case "0":
                return view('User/user_list_item', ['users' => $divided_users[0]]);
            case "1":
                return view('User/user_list_item', ['users' => $divided_users[1]]);
            default:
                return view('User/user_list_item', ['users' => $divided_users[2]]);
        }
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->input('item.id'));

        // foreachでデータを一括更新する
        foreach ($request->input('item') as $key => $data) {
            if ($key === 'password') {
                // パスワードは暗号化して保存
                $user->$key = bcrypt($data);
            } else if ($key === 'password_confirmation' or $key === 'radio') {
                continue;
            }
            else {
                $user->$key = $data;
            }
        }

        $user->save();

        $divided_users = $this->divideUsers();

        switch ($request->input('item.radio')) {
            case 0:
                return view('User/user_list_item', ['users' => $divided_users[0]]);
            case 1:
                return view('User/user_list_item', ['users' => $divided_users[1]]);
            default:
                return view('User/user_list_item', ['users' => $divided_users[2]]);
        }
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();

        $divided_users = $this->divideUsers();

        switch ($request->radio) {
            case "0":
                return view('User/user_list_item', ['users' => $divided_users[0]]);
            case "1":
                return view('User/user_list_item', ['users' => $divided_users[1]]);
            default:
                return view('User/user_list_item', ['users' => $divided_users[2]]);
        }
    }
}
