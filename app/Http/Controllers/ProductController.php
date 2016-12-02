<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Product;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$product = Product::All();
    	return view('product.show',compact('product'));
    }

    public function create(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            return view('product.create');
        }else{
            return redirect('product/');
        }
        
    }

    public function createAction(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
        	$product = new Product;
        	$product->name = Input::get('name');
        	$product->amount = Input::get('amount');
            $product->amount_max = Input::get('amount_max');
            $product->amount_alert = Input::get('amount_alert');
        	$product->save();

        	return redirect('product/');
        }else{
            return redirect('product/');
        }
    }

    public function store($id){
        if(\Auth::check() && \Auth::user()->level != 'user') {
            $product = Product::find($id);
            return view('product.edit',compact('product'));
        }else{
            return redirect('product/');
        }
    }

    public function storeAction(){
        if(\Auth::check() && \Auth::user()->level != 'user') {
        	$product = Product::find(Input::get('id'));
        	$product->name = Input::get('name');
        	$product->amount = Input::get('amount');
            $product->amount_max = Input::get('amount_max');
            $product->amount_alert = Input::get('amount_alert');
        	$product->save();

        	return redirect('product/');
        }else{
            return redirect('product/');
        }
    }

    public function detroy($id){
    	Product::destroy($id);
    	return redirect('product/');
    }
}
