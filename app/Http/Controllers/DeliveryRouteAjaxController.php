<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRoute;

class DeliveryRouteAjaxController extends Controller
{
    public function sendRouteList()
    {
        return view('DeliveryRoute/route_list', ['routes' => DeliveryRoute::all()]);
    }

    public function sendRouteModal($id)
    {
        $route = DeliveryRoute::find($id);

        return view('DeliveryRoute/route_modal', ['route' => $route]);
    }

    public function searchRouteData(Request $request)
    {
        $word = $request->input('word');

        $routes = DeliveryRoute::where('name', $word)->get();

        return view('DeliveryRoute/route_list', ['routes' => $routes]);
    }
}
