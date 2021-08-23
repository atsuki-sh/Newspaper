<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryRouteController extends Controller
{
    public function index()
    {
        return view('DeliveryRoute/route');
    }
}
