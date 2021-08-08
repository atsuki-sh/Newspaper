<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ラジオボタンの状態に合ったユーザーリストを返すメソッド
    public function sendUserList($radio)
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

        $divided_users = [$all_users, $admin_users, $common_users];

        switch ($radio) {
            case "0":
                return view('User/user_list_item', ['users' => $divided_users[0]]);
            case "1":
                return view('User/user_list_item', ['users' => $divided_users[1]]);
            default:
                return view('User/user_list_item', ['users' => $divided_users[2]]);
        }
    }

    public function index()
    {
        return view('User/user', ['users' => User::all()]);
    }

    public function indexRadio(Request $request)
    {
        return $this->sendUserList($request->input('item.radio'));
    }

    public function create(UserRequest $request)
    {
        $user = new User();

        foreach ($request->input('item') as $key => $data) {
            if ($key === 'password') {
                $user->$key = bcrypt($data);
            } else if ($key === 'id' or $key === 'password_confirmation' or $key === 'radio') {
                continue;
            }
            else {
                $user->$key = $data;
            }
        }

        $user->save();

        return $this->sendUserList($request->input('item.radio'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->input('item.id'));

        foreach ($request->input('item') as $key => $data) {
            if ($key === 'password') {
                $user->$key = bcrypt($data);
            } else if ($key === 'id' or $key === 'password_confirmation' or $key === 'radio') {
                continue;
            }
            else {
                $user->$key = $data;
            }
        }

        $user->save();

        return $this->sendUserList($request->input('item.radio'));
    }

    public function delete(Request $request)
    {
        User::find($request->input('item.id'))->delete();

        return $this->sendUserList($request->input('item.radio'));
    }
}
