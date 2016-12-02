@extends('layouts.app')
@section('content')
<div class="w-3container">
    <br><br>
</div>
<div class="w3-row">
    <div class="w3-col s4 w3-center">
    <p></p>
    </div>

    <div class="w3-col s4 w3-white w3-animate-opacity">
    <div action="form.asp" class="w3-card-4">
        <div class="w3-container w3-teal">
            <h2>Sales</h2>
        </div>
        <form class="w3-container" role="form" method="POST" action="{{ url('/sales/create') }}" accept-charset="utf-8" onsubmit="return confirm('Do you really want to submit the form?');">
            {!! csrf_field() !!}
            <p>
            <label class="w3-label w3-text-teal">Customer:</label>
			<select class="w3-select w3-border" id="customer_id" name="customer_id" required>
				@foreach ($customer as $s)
				<option value="{{$s->id}}">{{$s->name}}</option>
				@endforeach
			</select>
			</p>
			<p>
            <label class="w3-label w3-text-teal">Product:</label>
			<select class="w3-select w3-border" id="product_id" name="product_id" required>
				@foreach ($product as $s)
				<option value="{{$s->id}}">{{$s->name}}</option>
				@endforeach
			</select>
			</p>
			<p>
            <label class="w3-label w3-text-teal">Amount:</label>
			<input type="number" class="w3-input w3-border w3-white" id="amount" name="amount" placeholder="100,200,300" required>
			</p>
			<p>
            <button class="w3-btn w3-round w3-teal">Submit</button>
            <a href="{{ URL::previous() }}" class="w3-btn w3-round w3-blue" role="button">Back</a>
            </p>		
        </form>
    </div>
    </div>

    <div class="w3-col s4 w3-center">
    <p></p>
    </div>
</div>
@endsection