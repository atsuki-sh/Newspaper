<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRoute;
use Illuminate\Support\Facades\Auth;

class DeliveryRouteController extends Controller
{
    public function index()
    {
        return view('DeliveryRoute/route', ['routes' => DeliveryRoute::all()]);
    }

    public function create(Request $request)
    {
        $route = new DeliveryRoute();
        $items = $request->input('item');
        $route->fill($items);
        $route->updated_by = Auth::user()->name;
        $route->save();
    }

    public function update(Request $request)
    {
        $route = DeliveryRoute::find($request->input('item.id'));
        $items = $request->input('item');
        $route->fill($items);
        $route->updated_by = Auth::user()->name;
        $route->save();
    }

    public function delete(Request $request)
    {
        DeliveryRoute::find($request->input('id'))->delete();
    }
}
