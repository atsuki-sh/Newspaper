<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        return view('Point/point', ['points' => Point::all()]);
    }

    public function customerUpdate(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->point_id = $request->point_id;
        $customer->save();

        $point = Point::find($request->point_id);
        $customers = $point->customer()->get();

        return view('Point/point_customer_modal_item', ['point' => $point, 'customers' => $customers]);
    }

    public function customerDelete(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->point_id = null;
        $customer->save();

        $point = Point::find($request->point_id);
        $customers = $point->customer()->get();

        return view('Point/point_customer_modal_item', ['point' => $point, 'customers' => $customers]);
    }
}
