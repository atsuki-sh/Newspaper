<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Customer;
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

    public function searchCustomerData(Request $request)
    {
        $word = $request->input('word');

        $customers = Customer::where([
            ['name', '=', $word, 'or'],
            ['tel', '=', $word, 'or'],
            ['address', '=', $word, 'or'],
        ])->get();

        return view('Point/point_customer_list_item', ['customers' => $customers]);
    }
}
