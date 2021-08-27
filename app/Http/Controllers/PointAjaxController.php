<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Customer;
use Illuminate\Http\Request;

class PointAjaxController extends Controller
{
    public function sendPointList()
    {
        return view('Point/point_list', ['points' => Point::all()]);
    }

    public function sendPointModal($id)
    {
        return view('Point/point_modal', ['point' => Point::find($id)]);
    }

    public function searchPointData(Request $request)
    {
        $points = Point::where('name', $request->word)->get();

        return view('Point/point_list', ['points' => $points]);
    }

    public function sendCustomerModal($id)
    {
        $point = Point::find($id);
        $customers = $point->customer()->get();

        return view('Point/point_customer_modal', ['point' => $point, 'customers' => $customers]);
    }

    public function searchCustomerData(Request $request)
    {
        $word = $request->word;

        $customers = Customer::where([
            ['name', '=', $word, 'or'],
            ['tel', '=', $word, 'or'],
            ['address', '=', $word, 'or'],
        ])->get();

        return view('Point/point_customer_list_item', ['customers' => $customers, 'bool' => false]);
    }
}
