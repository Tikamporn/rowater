<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Team;
use Auth;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$team = Team::All();
    	return view('team.show',compact('team'));
    }

    public function member($id) {
    	$team = Team::where('id',$id)->get();
    	return view('team.member',compact('team'));
    }
}
