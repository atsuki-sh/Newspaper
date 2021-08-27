<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Point;
use Illuminate\Http\Request;
use App\Http\Requests\PointRequest;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function index()
    {
        return view('Point/point', ['points' => Point::all()]);
    }

    public function update(PointRequest $request)
    {
        $point = Point::find($request->input('item.id'));
        $items = $request->input('item');
        $point->fill($items);
        $point->updated_by = Auth::user()->name;
        $point->save();
    }

    public function delete(Request $request)
    {
        Point::find($request->id)->delete();
    }


    public function customerUpdate(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->point_id = $request->point_id;
        $customer->save();

        $point = Point::find($request->point_id);
        $point->updated_by = Auth::user()->name;
        $point->save();

        $customers = $point->customer()->get();

        return view('Point/point_customer_modal', ['point' => $point, 'customers' => $customers]);
    }

    public function customerDelete(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->point_id = null;
        $customer->save();

        $point = Point::find($request->point_id);
        $point->updated_by = Auth::user()->name;
        $point->save();
        $customers = $point->customer()->get();

        return view('Point/point_customer_modal', ['point' => $point, 'customers' => $customers]);
    }
}
