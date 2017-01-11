<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Zone;

class ZoneController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
    	$zone = Zone::All();
    	return view('zone.show',compact('zone'));
    }

    public function create()
    {
    	if(\Auth::check() && \Auth::user()->level != 'user') {
        	return view('zone.create');
        }else{
            return redirect('zone/');
        }
    }

    public function createAction() 
    {
    	if(\Auth::check() && \Auth::user()->level != 'user') {
        	$zone = new Zone;
	    	$zone->name = Input::get('name');
	    	$zone->detail = Input::get('detail');
	    	$zone->save();
        	return redirect('zone/');
        }else{
            return redirect('zone/');
        }
    }

    public function edit($id)
    {
    	if(\Auth::check() && \Auth::user()->level != 'user') {
        	$zone = Zone::find($id);
    		return view('zone.edit',compact('zone'));
        }else{
            return redirect('zone/');
        }
    }

    public function editAction() 
    {
    	if(\Auth::check() && \Auth::user()->level != 'user') {
        	$zone = Zone::find(Input::get('id'));
        	$zone->name = Input::get('name');
	    	$zone->detail = Input::get('detail');
	    	$zone->save();
    		return redirect('zone/');
        }else{
            return redirect('zone/');
        }
    }

    public function delete($id)
    {
    	Zone::destroy($id);
    	return redirect('zone/');
    }
}
