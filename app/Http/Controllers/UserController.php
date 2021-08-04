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
        $users = User::all();

        return view('User/user', ['users' => $users]);
    }

    public function create(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->admin = $request->admin;

        $user->save();

        $users = User::all();

        return $users;
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->admin = $request->admin;

        $user->save();

        $users = User::all();

        return $users;
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();

        $users = User::all();

        return $users;
    }
}
