<?php

namespace App\Http\Controllers\Management;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Auth;
use App\Customer;
use App\Customerrequest;
use App\Delivery_salses;
use App\Product;
use App\Team;
use App\Group;
use App\Zone;

use Carbon\Carbon;

class ManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $date = Carbon::now()->toDateTimeString();

    	$customer = Customer::where('date','<=',$date)->get();
    	$customerrequest = Customerrequest::where('status',1)->get();
        $team = Team::All();

    	return view('management.show',compact('customer','customerrequest','team'));
    }

    public function customerlist()
    {
        $delivery = Delivery_salses::where('status','0')->get();
        return view('management.list',compact('delivery'));
    }

    public function createAction()
    {
    	$customer_id = Input::get('customer_id');
    	$team_id = Input::get('team_id');
        $date = Carbon::now()->toDateTimeString();

    	foreach($customer_id as $index => $customer) 
        {
            $check = Delivery_salses::where('customer_id','=',$customer)->first();

            if($check == null)
            {
                $delivery = new Delivery_salses;
                $delivery->customer_id = $customer;
                $delivery->team_id = $team_id[$index];
                $delivery->transaction_date = $date;
                $delivery->save();
            }
            
        }

        return redirect('management/list');
    }
}
