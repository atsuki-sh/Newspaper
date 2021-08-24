<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointAjaxController extends Controller
{
    public function sendPointList()
    {
        return view('Point/point_list_item', ['points' => Point::all()]);
    }
}
