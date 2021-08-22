<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Container\CircularDependencyException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('Customer/customer', ['customers' => $customers]);
    }

    public function create(Request $request)
    {
        $customer = new Customer();
        $items = $request->input('item');
        $customer->fill($items);
        $customer->point_id = 1;
        $customer->save();

        return view('Customer/customer_list_item', ['customers' => Customer::all()]);
    }

    public function update(Request $request)
    {
        $customer = Customer::find($request->input('item.id'));
        $items = $request->input('item');
        $customer->fill($items);
        $customer->save();

        return view('Customer/customer_list_item', ['customers' => Customer::all()]);
    }

    public function delete(Request $request)
    {

    }
}
