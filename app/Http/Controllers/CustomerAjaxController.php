<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerAjaxController extends Controller
{
    public function sendCustomerModal($id)
    {
        return view('customer/customer_modal_item', ['customer' => Customer::find($id)]);
    }

    public function sendCustomerList()
    {
        return view('Customer/customer_list_item', ['customers' => Customer::all()]);
    }

    public function searchCustomerData(Request $request)
    {
        $word = $request->word;

        $customers = Customer::where([
            ['name', '=', $word, 'or'],
            ['tel', '=', $word, 'or'],
            ['address', '=', $word, 'or'],
        ])->get();

        return view('Customer/customer_list_item', ['customers' => $customers]);
    }
}
