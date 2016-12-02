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
            <h2>New Customer</h2>
        </div>
        <form class="w3-container" role="form" method="POST" action="{{ url('/customer/addAction') }}" accept-charset="utf-8" onsubmit="return confirm('Do you really want to submit the form?');">
            {!! csrf_field() !!}
            <p>
            <label class="w3-label w3-text-teal">Name:</label>
			<input type="text" class="w3-input w3-border w3-white" id="name" name="name" required="" placeholder="Name Surname">
			</p>
			<p>
            <label class="w3-label w3-text-teal">Address:</label>
			<input type="text" class="w3-input w3-border w3-white" id="address" name="address" placeholder="173/27 Kathu Phuket">
			</p>
			<p>
            <label class="w3-label w3-text-teal">Phone:</label>
			<input type="number" class="w3-input w3-border w3-white" id="tel" name="tel" placeholder="0846431992">
			</p>
			<p>
            <label class="w3-label w3-text-teal">Price:</label>
			<input type="number" class="w3-input w3-border w3-white" id="price" name="price" placeholder="50">
			</p>
			<p>
            <label class="w3-label w3-text-teal">Amount:</label>
			<input type="number" class="w3-input w3-border w3-white" id="amount" name="amount" placeholder="5">
			</p>
			<p>
			<div class="w3-row-padding">
				<div class="w3-half">
					<label class="w3-label w3-text-teal">Zone:</label>
					<select class="w3-select w3-border" id="zone" name="zone" required="">
						@foreach (App\Zone::all() as $zone)
							<option value="{{$zone->id}}">{{$zone->name}} ({{$zone->detail}})</option>
						@endforeach
					</select>
				</div>	
				<div class="w3-half">
					<label class="w3-label w3-text-teal">Group:</label>
					<select class="w3-select w3-border" id="group" name="group" required="">
						@foreach (App\Group::all() as $group)
							<option value="{{$group->id}}">{{$group->name}} ({{$group->detail}})</option>
						@endforeach
					</select>
				</div>	
			</div>	
			</p>
			<p>
            <label class="w3-label w3-text-teal">Latitude:</label>
			<input type="text" class="w3-input w3-border w3-white" id="lat" name="lat" placeholder="7.9367872">
			</p>
			<p>
            <label class="w3-label w3-text-teal">Longtitude:</label>
			<input type="text" class="w3-input w3-border w3-white" id="long" name="long" placeholder="98.3643209">
			</p>
			<p>
			<div class="w3-row-padding">
				<div class="w3-half">
					<label class="w3-label w3-text-teal">Need Vat:</label>
						<input class="w3-radio" type="radio" name="vat" value="yes">
						<label class="w3-validate">Yes</label>
						<input class="w3-radio" type="radio" name="vat" value="no" checked>
						<label class="w3-validate">No</label>
				</div>	
				<div class="w3-half">
					<label class="w3-label w3-text-teal">Type:</label>
						<input class="w3-radio" type="radio" name="type" value="cash" checked>
						<label class="w3-validate">Cash</label>
						<input class="w3-radio" type="radio" name="type" value="credit">
						<label class="w3-validate">Credit</label>
				</div>	
			</div>	
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
