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

    public function sendCustomerModal($id)
    {
        $point = Point::find($id);
        $customers = $point->customer()->get();

        return view('Point/point_customer_modal_item', ['point' => $point, 'customers' => $customers]);
    }
}
