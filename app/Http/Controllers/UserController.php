<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('User/user', ['users' => User::all()]);
    }

    public function create(UserRequest $request)
    {
        $user = new User();
        $items = $request->input('item');
        $user->fill($items);
        $user->password = bcrypt($user->password);
        $user->save();
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->input('item.id'));

        // 現在のパスワード
        $old_password = $user->password;

        $items = $request->input('item');
        $user->fill($items);

        // パスワードに変更があったら新しく保存する
        if ($user->password === null) {
            $user->password = $old_password;
        } else {
            $user->password = bcrypt($user->password);
        }

        $user->save();
    }

    public function delete(Request $request)
    {
        User::find($request->input('item.id'))->delete();
    }
}
