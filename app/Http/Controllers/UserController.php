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
        // todo こんな感じで簡単に書ける
        $users = User::query();
        switch ($radio) {
            case "1":
                $users = $users->where('admin', '=', '1');
                break;
            case "2":
                $users = $users
                    ->where('admin', '=', '0')
                    ->whereNotNull('admin');
                break;
            default:
                break;
        }
        return view('User/user_list_item', ['users' => $users->get()]);
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
        $items = $request->input('item');
        $user->fill($items);
        $user->password = bcrypt($user->password);
        $user->save();

        return $this->sendUserList($request->input('item.radio'));
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

        return $this->sendUserList($request->input('item.radio'));
    }

    public function delete(Request $request)
    {
        User::find($request->input('item.id'))->delete();

        return $this->sendUserList($request->input('item.radio'));
    }
}
