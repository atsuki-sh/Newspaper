<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Http\Requests\RouteRequest;
use App\Models\DeliveryRoute;
use Illuminate\Support\Facades\Auth;

class DeliveryRouteController extends Controller
{
    public function index()
    {
        return view('DeliveryRoute/route', ['routes' => DeliveryRoute::all()]);
    }

    public function create(RouteRequest $request)
    {
        $route = new DeliveryRoute();
        $items = $request->input('item');
        $route->fill($items);
        $route->updated_by = Auth::user()->name;
        $route->save();
    }

    public function update(RouteRequest $request)
    {
        $route = DeliveryRoute::find($request->input('item.id'));
        $items = $request->input('item');
        $route->fill($items);
        $route->updated_by = Auth::user()->name;
        $route->save();
    }

    public function delete(Request $request)
    {
        DeliveryRoute::find($request->id)->delete();
    }

    public function pointUpdate(Request $request)
    {
        $point = Point::find($request->point_id);
        $point->delivery_route_id = $request->route_id;
        $point->save();

        $route = DeliveryRoute::find($request->route_id);
        $route->updated_by = Auth::user()->name;
        $route->save();

        $points = $route->point()->get();

        return view('DeliveryRoute/point_modal', ['route' => $route, 'points' => $points]);
    }

    public function pointDelete(Request $request)
    {
        $point = Point::find($request->point_id);
        $point->delivery_route_id = null;
        $point->save();

        $route = DeliveryRoute::find($request->route_id);
        $route->updated_by = Auth::user()->name;
        $route->save();

        $points = $route->point()->get();

        return view('DeliveryRoute/point_modal', ['route' => $route, 'points' => $points]);
    }
}
