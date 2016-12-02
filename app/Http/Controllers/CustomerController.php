<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Customer;
use App\Team;
use Auth;

class CustomerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$customer = Customer::All();
    	return view('customer.show',compact('customer'));
    }

    public function create(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            return view('customer.create');
        }else{
            return redirect('customer/');
        }
        
    }

    public function createAction(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
        	$customer = new Customer;
        	$customer->name = Input::get('name');
        	$customer->address = Input::get('address');
        	$customer->tel = Input::get('tel');
        	$customer->zone_id = Input::get('zone');
        	$customer->group_id = Input::get('group');
            $customer->price = Input::get('price');
            $customer->amount = Input::get('amount');
            $customer->lat = Input::get('lat');
            $customer->long = Input::get('long');
        	$customer->vat = Input::get('vat');
        	$customer->type = Input::get('type');
        	$customer->save();

        	return redirect('customer/');
        }else{
            return redirect('customer/');
        }
    }

    public function store($id){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            $customer = Customer::find($id);
            return view('customer.edit',compact('customer'));
        }else{
            return redirect('customer/');
        }
    }

    public function storeAction(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            $customer = Customer::find(Input::get('id'));
            $customer->name = Input::get('name');
            $customer->address = Input::get('address');
            $customer->tel = Input::get('tel');
            $customer->zone_id = Input::get('zone');
            $customer->group_id = Input::get('group');
            $customer->price = Input::get('price');
            $customer->amount = Input::get('amount');
            $customer->lat = Input::get('lat');
            $customer->long = Input::get('long');
            $customer->vat = Input::get('vat');
            $customer->type = Input::get('type');
            $customer->save();
            return redirect('customer/');
        }else{
            return redirect('customer/');
        }
    }

    public function showMap($id){
        $customer = Customer::find($id);
        return view('customer.map',compact('customer'));
    }
}
