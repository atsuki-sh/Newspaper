<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    // 管理者ユーザーと一般ユーザーで分けるためのメソッド
    public function divideUsers()
    {
        $all_users = User::all();
        $common_users = [];
        $admin_users = [];

        foreach ($all_users as $user) {
            $user->password = Crypt::decrypt($user->password);

            if ($user->admin === "0") {
                array_push($common_users, $user);
            } else {
                array_push($admin_users, $user);
            }
        }

        // [0]に一般、[1]に管理者のユーザーを返す
        return [$common_users, $admin_users];
    }

    public function index()
    {
        $divided_users = $this->divideUsers();

        return view('User/user', ['common_users' => $divided_users[0], 'admin_users' => $divided_users[1]]);
    }

    public function create(UserRequest $request)
    {
        $user = new User();
        // データを一括作成する
        foreach ($request->input('item') as $key => $data) {
            if ($key === 'password') {
                // パスワードは暗号化して保存
                $user->$key = Crypt::encrypt($data);
            } else {
                $user->$key = $data;
            }
        }

//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = Crypt::encrypt($request->password);
//        $user->admin = $request->admin;

        $user->save();

        $divided_users = $this->divideUsers();

        return view('User/user_list_item', ['common_users' => $divided_users[0], 'admin_users' => $divided_users[1]]);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->input('item.id'));
        // foreachでデータを一括更新する
        foreach ($request->input('item') as $key => $data) {
            if ($key === 'password') {
                // パスワードは暗号化して保存
                $user->$key = Crypt::encrypt($data);
            } else {
                $user->$key = $data;
            }
        }

        $user->save();
//        dd($request->input('item'));

//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = Crypt::encrypt($request->password);
//        $user->admin = $request->admin;
//
//        $user->save();

        $divided_users = $this->divideUsers();

        return view('User/user_list_item', ['common_users' => $divided_users[0], 'admin_users' => $divided_users[1]]);
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();

        $divided_users = $this->divideUsers();

        return view('User/user_list_item', ['common_users' => $divided_users[0], 'admin_users' => $divided_users[1]]);
    }
}
