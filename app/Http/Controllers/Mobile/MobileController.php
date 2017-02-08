<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Team;
use App\User;
use App\Zone;
use App\Group;
use App\Product;
use App\Customerrequest;
use App\Delivery_salses;

use Carbon\Carbon;


class MobileController extends Controller
{
    public function delivery() {
        $user_id = Input::get('id');
        $customer = [];
        $team = Team::All();

        foreach ($team as $index_team => $teams) 
        {
            foreach($teams->User as $index_user => $users)
            {
                if($user_id == $users->id)
                {
                    $data = Delivery_salses::where('team_id',$teams->id)->where('status','0')->get();
                    foreach($data as $c)
                    {
                        $product = $c->Customer->Product;
                        $tmp = ["t_id"=>$c->id,"id"=>$c->Customer->id,"name"=>$c->Customer->name,"address"=>$c->Customer->address,"group"=>$c->Customer->Group->name,"tel"=>$c->Customer->tel,'lat'=>$c->Customer->lat,'long'=>$c->Customer->long,'product'=>$product['0']['name'],'amount'=>$c->Customer->deposit_unit,'price'=>$c->Customer->price];
                        array_push($customer, $tmp);
                    }                
                }
            }
        }

        echo json_encode(array('customer'=>$customer));
    }

    public function login() {
		$pin = Input::get('pin');
    	$user = User::where('pin',$pin)->first();
        $team = Team::All();

        $data = [];

        if($user)
        {
            foreach ($team as $index_team => $teams) 
            {
                foreach($teams->User as $index_user => $users)
                {
                    if($user->id == $users->id)
                    {
                        $data =["id"=>$users->id,"name"=>$users->name];
                        break;
                    }
                }
            }
            echo json_encode(array('data'=>$data));
        }
    }

    public function getzone() 
    {
        $zone = Zone::All();
        echo json_encode(array('zone'=>$zone));
    }

    public function getgroup() 
    {
        $group = Group::All();
        echo json_encode(array('group'=>$group));
    }

    public function getproduct() 
    {
        $product = Product::All();
        echo json_encode(array('product'=>$product));
    }

    public function newcustomer() 
    {
        $date = Carbon::now()->addWeek()->toDateTimeString();

        $user_id = Input::get('id');

        $team = Team::All();

        $team_id = null;

        foreach($team as $teams)
        {
            foreach($teams->User as $tmp)
            {
                if($tmp->pivot->user_id == $user_id){
                    if($team_id == null)
                    {
                        $team_id = $tmp->pivot->team_id;
                    }
                }
            }
            
        }

        $customer = new Customer;
        $customer->name = Input::get('name');
        $customer->tel = Input::get('tel');
        $customer->pin = Input::get('tel');
        $customer->deposit_unit = Input::get('amount');
        $customer->price = Input::get('price');
        $customer->lat = Input::get('lat');
        $customer->long = Input::get('lng');
        $customer->ship_number = "";
        $customer->addr_no = "";
        $customer->addr_village = "";
        $customer->addr_village_no = "";
        $customer->addr_soi = "";
        $customer->addr_subdistrict = "";
        $customer->addr_district = "";
        $customer->addr_road = "";
        $customer->addr_province = "";
        $customer->addr_postcode = "";
        $customer->date = $date;

        $zone = Input::get('zone');
        $group = Input::get('group');
        $product = Input::get('product');

        $zone_id = Zone::where('name',$zone)->first();
        $zone_id = $zone_id->id;

        $group_id = Group::where('name',$group)->first();
        $group_id = $group_id->id;

        $product_id = Product::where('name',$product)->first();
        $product_id = $product_id->id;

        $customer->zone_id = $zone_id;
        $customer->group_id = $group_id;

        $customer->team_id = $team_id;
        $customer->save();

        $customer->product()->attach($product_id);

        echo json_encode("success");
    }

    public function transaction()
    {
        $transaction_id = Input::get('t_id');
        $id = Input::get('id');
        $product = Input::get('product');
        $amount = Input::get('amount');
        $price = Input::get('price');

        $product_id = Product::where('name',$product)->first();
        $product_id = $product_id->id;

        $product = Product::where('name',$product)->first();
        if($product->amount > $amount) 
        {
            $delivery = Delivery_salses::find($transaction_id);
            $delivery->status = '1';
            $delivery->transaction_complete_datetime = Carbon::now()->toDateTimeString();
            $delivery->save();

            $product->amount = $product->amount - $amount;
            $product->save();

            $customer = Customer::find($id);
            $customer->date = Carbon::now()->addWeek()->toDateTimeString();
            $customer->save();
        }
    }


    public function print() 
    {
        $transaction_id = Input::get('t_id');
        $delivery = Delivery_salses::find($transaction_id);
        $delivery->count_print += 1;
        $delivery->save();
    }
}