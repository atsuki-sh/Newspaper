<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRoute;

class DeliveryRouteAjaxController extends Controller
{
    public function sendRouteModal($id)
    {
        $route = DeliveryRoute::find($id);

        return view('DeliveryRoute/route_modal', ['route' => $route]);
    }
}
