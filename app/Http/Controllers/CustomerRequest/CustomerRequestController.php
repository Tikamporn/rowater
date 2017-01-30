<?php

namespace App\Http\Controllers\CustomerRequest;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Auth;
use App\Customer;
use App\Customerrequest;
use App\Product;
use App\Team;
use App\Group;
use App\Zone;

class CustomerRequestController extends Controller
{
	public function request() {
        $product = Product::All();
        $data = null;
        $result = null;
        return view('customer.request',compact('product','data','result'));
    }

    public function requestAction() {
        $pin = Input::get('pin');
        $product_id = Input::get('product_id');
        $amount = Input::get('amount');
        $customer = Customer::where('pin','=',$pin)->first();

        $request = new Customerrequest;
        $product = Product::All();

        if($customer != null) {    
            $customer_id = $customer->id;
            $request->customer_id = $customer_id;
            $request->product_id = $product_id;
            $request->amount = $amount;
            $request->save();
            $data = null;
            $result = "Successful";
            return view('customer.request',compact('data','product','result'));
        }else {
            $data = "Invalid PINCODE";
            $result = null;
            return view('customer.request',compact('data','product','result'));
        }
    }
}
