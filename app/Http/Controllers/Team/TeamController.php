<?php

namespace App\Http\Controllers\Team;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Team;
use App\Zone;
use App\User;
use Auth;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
    	$team = Team::All();
    	return view('team.show',compact('team'));
    }

    public function member($id) 
    {
    	$team = Team::where('id',$id)->get();
    	return view('team.member',compact('team','id'));
    }

    public function create() 
    {
        $zone = Zone::All();
        $user = User::All();
        return view('team.create',compact('zone','user'));
    }

    public function createAction() 
    {
        $name = Input::get('name');
        $zone = Input::get('zone');
        $header = Input::get('header');
        $member = Input::get('member');

        $team = new Team;
        $team->name = $name;
        $team->save();

        foreach($zone as $s)
        {
            $team->zone()->attach($s);
        }

        $count = 0;

        foreach($member as $s)
        {
            if($s == $header)
            {
                $count++;
            }
        }

        if($count==0)
        {
            $team->user()->attach($header,['role' => "หัวหน้าทีม"]);
        }

        foreach($member as $s)
        {
            if($s == $header)
            {
                $team->user()->attach($s,['role' => "หัวหน้าทีม"]);
            }else {
                $team->user()->attach($s);
            }
        }

        return redirect('team/');
    }

    public function zonedelete() 
    {
        $team = Team::find(Input::get('team'));
        $team->zone()->detach(Input::get('zone'));
        return redirect()->action('TeamController@member', ['id' => Input::get('team')]);
    }

    public function memberdelete() 
    {   
        $team = Team::find(Input::get('team'));
        $team->user()->detach(Input::get('member'));
        return redirect()->action('TeamController@member', ['id' => Input::get('team')]);
    }

    public function delete($id) 
    {
        Team::destroy($id);
        return redirect('team/');
    }

    public function store($id) 
    {
        $zone = Zone::All();
        $user = User::All();
        $team = Team::find($id);

        $arr_member = [];
        $arr_zone = [];

        foreach ($team->User as $s) {
            array_push($arr_member, $s->id);
        }

        foreach ($team->Zone as $s) {
            array_push($arr_zone, $s->id);
        }

        return view('team.edit',compact('zone','user','team','id','arr_member','arr_zone'));
    }

    public function storeAction($id) 
    {
        $team = Team::find($id);
        $zone = Input::get('zone');
        $name = Input::get('name');

        $team->name = $name;
        $team->save();

        foreach($team->User as $s)
        {
            $team->user()->detach($s->id);
        }

        foreach($team->Zone as $s)
        {
            $team->zone()->detach($s->id);
        }

        $member = Input::get('member');
        $header = Input::get('header');

        $count = 0;

        foreach($member as $s)
        {
            if($s == $header)
            {
                $count++;
            }
        }

        if($count==0)
        {
            $team->user()->attach($header,['role' => "หัวหน้าทีม"]);
        }

        foreach($member as $s)
        {
            if($s == $header)
            {
                $team->user()->attach($s,['role' => "หัวหน้าทีม"]);
            }else {
                $team->user()->attach($s);
            }
        }

        foreach($zone as $s)
        {
            $team->zone()->attach($s);
        }

        return redirect('team/');
    }
}
