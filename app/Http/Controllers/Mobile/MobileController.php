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
use App\Product;
use App\Customerrequest;

class MobileController extends Controller
{
    // public function getAll() {
    //     $pin = Input::get('pin');
    //     $user = User::where('pin','=',$pin)->first();

    //     if($user!=NULL) {
    //         $customer = Customer::All();
    //         echo json_encode(array('customer'=>$customer));
    //     }
    // }

    public function getCustomer() {
        $team_id = Input::get('id');
        $pin = Input::get('pin');
        $customer = [];

        if(true) {
            $data = Zone::where('team_id',$team_id)->get();
            foreach ($data as $s) {
                if($s!=null) {
                    foreach ($s->Customer as $d) {
                        if($d!=null) {
                            // $tmp = ["id"=>$d->id,
                            // "name"=>$d->name,
                            // "address"=>$d->address,
                            // "tel"=>$d->tel,
                            // "zone_id"=>$d->zone_id,
                            // "group_id"=>$d->group_id,
                            // "amount"=>$d->amount,
                            // "price"=>$d->price,
                            // "status"=>$d->status,
                            // "vat"=>$d->vat,
                            // "type"=>$d->type,
                            // "lat"=>$d->lat,
                            // "long"=>$d->long
                            // ];

                            $tmp = ["id"=>$d->id,"name"=>$d->name,"address"=>$d->address,"group"=>$d->Group->name,"tel"=>$d->tel];
                            array_push($customer, $tmp);
                        }                  
                    }
                }
            }
        }
        echo json_encode(array('customer'=>$customer));
    }

    public function test() {
        $data = Zone::where('team_id',3)->get();
            foreach ($data as $s) {
                if($s!=null) {
                    foreach ($s->Customer as $d) {
                        if($d!=null) {
                            echo $d->Group->name;
                        }               
                    }
                }
            }
    }

    public function logIn() {
		$pin = Input::get('pin');
    	$user = User::where('pin','=',$pin)->first();

        $data = [];

        if($user!=NULL){
            $team = Team::where('user_id',$user->id)->first();
            if($team!=NULL) {
                $data =["id"=>$team->id,
                        "name"=>$user->name];
                echo json_encode(array('data'=>$data));
            }
        }
    }
}