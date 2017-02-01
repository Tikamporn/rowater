<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Auth;
use App\Customer;
use App\Product;
use App\Team;
use App\Group;
use App\Zone;

use Carbon\Carbon;

class CustomerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$customer = Customer::All();
        $vat = Customer::where('vat','!=','0')->get();
        $novat = Customer::where('vat','0')->get();
        $product = Product::All();
    	return view('customer.show',compact('customer','vat','novat','product'));
    }

    public function create(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            $zone = Zone::All();
            $team = Team::All();
            $group = Group::All();
            $product = Product::All();
            $customer = Customer::max('id');
            return view('customer.create',compact('zone','team','group','customer','product'));
        }else{
            return redirect('customer/');
        }
        
    }

    public function createAction(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
        	$customer = new Customer;
        	$customer->name = Input::get('name');
            $customer->addr_no = Input::get('addr_no');
            $customer->addr_village = Input::get('addr_village');
            $customer->addr_village_no = Input::get('addr_village_no');
            $customer->addr_soi = Input::get('addr_soi');
            $customer->addr_subdistrict = Input::get('addr_subdistrict');
            $customer->addr_district = Input::get('addr_district');
            $customer->addr_road = Input::get('addr_road');
            $customer->addr_province = Input::get('addr_province');
        	$customer->addr_postcode = Input::get('addr_postcode');
            $customer->tel = Input::get('tel');
        	$customer->pin = Input::get('tel');
            $customer->status = Input::get('status');
        	$customer->zone_id = Input::get('zone');
        	$customer->group_id = Input::get('group');
            $customer->team_id = Input::get('team');
            $customer->price = Input::get('price');
            $customer->deposit_unit = Input::get('unit');
            $customer->lat = Input::get('latitude');
            $customer->long = Input::get('longtitude');
        	$customer->vat = Input::get('vat');
        	$customer->type = Input::get('type');
            $customer->ship_number = Input::get('shipnumber');
        	$customer->save();

            $product_id = Input::get('product_id');
            $product_date = Input::get('product_date');
            $product_amount = Input::get('product_amount');
            $product_price = Input::get('product_price');

            $customer->product()->attach($product_id,['amount' => $product_amount, 'day' => $product_date ,'price' => $product_price]);

        	return redirect('customer/');
        }else{
            return redirect('customer/');
        }
    }

    public function store($id){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            $customer = Customer::find($id);
            $zone = Zone::All();
            $team = Team::All();
            $group = Group::All();
            $product = Product::All();
            $target = $customer->product()->get();

            return view('customer.edit',compact('zone','team','group','customer','product','target'));
        }else{
            return redirect('customer/');
        }
    }

    public function storeAction(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            $customer = Customer::find(Input::get('id'));
            $customer->name = Input::get('name');
            $customer->addr_no = Input::get('addr_no');
            $customer->addr_village = Input::get('addr_village');
            $customer->addr_village_no = Input::get('addr_village_no');
            $customer->addr_soi = Input::get('addr_soi');
            $customer->addr_subdistrict = Input::get('addr_subdistrict');
            $customer->addr_district = Input::get('addr_district');
            $customer->addr_road = Input::get('addr_road');
            $customer->addr_province = Input::get('addr_province');
            $customer->addr_postcode = Input::get('addr_postcode');
            $customer->tel = Input::get('tel');
            // $customer->pin = Input::get('tel');
            $customer->status = Input::get('status');
            $customer->zone_id = Input::get('zone');
            $customer->group_id = Input::get('group');
            $customer->team_id = Input::get('team');
            $customer->price = Input::get('price');
            $customer->deposit_unit = Input::get('unit');
            $customer->lat = Input::get('latitude');
            $customer->long = Input::get('longtitude');
            $customer->vat = Input::get('vat');
            $customer->type = Input::get('type');
            $customer->ship_number = Input::get('shipnumber');
            $customer->save();

            $customer = Customer::find(Input::get('id'));

            foreach($customer->Product as $s)
            {
                $customer->product()->detach($s->id);
            }

            $product_id = Input::get('product_id');
            $product_date = Input::get('product_date');
            $product_amount = Input::get('product_amount');
            $product_price = Input::get('product_price');

            $customer->product()->attach($product_id,['amount' => $product_amount, 'day' => $product_date ,'price' => $product_price]);

            return redirect('customer/');
        }else{
            return redirect('customer/');
        }
    }

    public function location($id){
        $customer = Customer::find($id);
        return view('customer.map',compact('customer'));
    }
}
