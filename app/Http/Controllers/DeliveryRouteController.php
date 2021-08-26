<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRoute;

class DeliveryRouteController extends Controller
{
    public function index()
    {
        return view('DeliveryRoute/route', ['routes' => DeliveryRoute::all()]);
    }
}
