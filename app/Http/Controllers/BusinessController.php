<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Auth;
use App\Log;
use App\Customer;
use App\Product;
use App\Zone;
use App\Team;
use Carbon\Carbon;
use App\Customerrequest;


class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = NULL; $team_name = NULL; $team_id = NULL;
    	return view('delivery.show',compact('data','team_name','team_id'));
   	}

    public function search() {
        $team_id = Input::get('team');
        $team_name = Team::where('id',$team_id)->get();
        $data = Zone::where('team_id',$team_id)->get();
        
        return view('delivery.show',compact('data','team_name','team_id'));
    }

    public function location($id) {
        $zone = Zone::where('team_id',$id)->get();

        $data = [];

        foreach ($zone as $d) {
            foreach($d->Customer as $s) {
                if($s->lat != null && $s->long != null) {
                    $tmp = ["title"=>$s->name,"description"=>$s->address,"lat"=>$s->lat,"lng"=>$s->long,"tel"=>$s->tel];
                }else {
                    $tmp = null;
                }
                array_push($data, $tmp);
            }
        }

        $data = json_encode($data);
        
        // echo json_encode(array('data'=>$data));
        return view('delivery.location',compact('data'));
    }

    public function show() {
        $customer = Customer::All();

        return view('purchase.show',compact('customer'));
    }

    public function create() {
        $product = Product::All();
        $customer = Customer::All();

        return view('purchase.create',compact('product','customer'));
    }

    public function createAction() {
        $customer_id = Input::get('customer_id');
        $product_id = Input::get('product_id');
        $amount = Input::get('amount');
        $product = Product::where('id',$product_id)->first();
        if($product->amount > $amount) {
            $product->amount = $product->amount - $amount;
            $product->save();
            $customers = Customer::find($customer_id);
            $customers->product()->attach($product_id,['amount' => $amount]);
        }
        $customer = Customer::All();

        return redirect('purchase/');
    }

    public function request() {
        $request = Customerrequest::where('status',1)->get();
        $error = null;
        return view('purchase.request',compact('request','error'));
    }

    public function requestAction($id) {
        $request = Customerrequest::find($id);

        $customer_id = $request->customer_id;
        $product_id = $request->product_id;
        $amount = $request->amount;

        $product = Product::where('id',$product_id)->first();

        if($product->amount > $amount) {
            $product->amount = $product->amount - $amount;
            $product->save();
            $request->status = 0;
            $request->save();
            $customers = Customer::find($customer_id);
            $customers->product()->attach($product_id,['amount' => $amount]);
            $request = Customerrequest::where('status',1)->get();
            $error = null;
            return view('purchase.request',compact('request','error'));
        }else {
            $error = "not enough";
            $request = Customerrequest::where('status',1)->get();
            return view('purchase.request',compact('request','error'));
        }
    }
}