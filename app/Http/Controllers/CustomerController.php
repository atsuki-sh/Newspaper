<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Container\CircularDependencyException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('Customer/customer', ['customers' => $customers]);
    }

    public function create(CustomerRequest $request)
    {
        $customer = new Customer();
        $items = $request->input('item');
        $customer->fill($items);
        $customer->updated_by = Auth::user()->name;
        $customer->save();
    }

    public function update(CustomerRequest $request)
    {
        $customer = Customer::find($request->input('item.id'));
        $items = $request->input('item');
        $customer->fill($items);
        $customer->updated_by = Auth::user()->name;
        $customer->save();
    }

    public function delete(Request $request)
    {
        Customer::find($request->id)->delete();
    }
}
