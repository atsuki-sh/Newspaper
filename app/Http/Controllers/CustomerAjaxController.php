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
}
