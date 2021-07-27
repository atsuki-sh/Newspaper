<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        // Usersテーブルの全データを取得
        $users = User::all();
        echo $users;

        // Pointsテーブルの全データを取得
        $points = Point::all();
        echo $points;

        // id=2のユーザーが持っているデリバリーを取得
        $delivery = User::find(2)->delivery;
        echo $delivery;
        // そのユーザーが持っている配達の詳細を取得
        $delivery_detail = $delivery->delivery_detail;
        echo $delivery_detail;
        // その配達詳細のポイントなどを取得
        echo $delivery_detail[1]->point;
        echo $delivery_detail[1]->delivery;

        // ちゃんとリレーションを使ってデータを取得することができた
    }
}
