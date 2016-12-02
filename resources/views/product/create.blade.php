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
            <h2>New Product</h2>
        </div>
        <form class="w3-container" role="form" method="POST" action="{{ url('/product/addAction') }}" accept-charset="utf-8" onsubmit="return confirm('Do you really want to submit the form?');">
            {!! csrf_field() !!}
            <p>
            <label class="w3-label w3-text-teal">Name:</label>
			<input type="text" class="w3-input w3-border w3-white" id="name" name="name" required="" placeholder="Name of product">
			</p>
			<p>
			<div class="w3-row-padding">
				<div class="w3-third">
					<label class="w3-label w3-text-teal">Amount:</label>
					<input type="number" class="w3-input w3-border w3-white" id="amount" name="amount" placeholder="5">
				</div>
				<div class="w3-third">
					<label class="w3-label w3-text-teal">Amount-Max:</label>
					<input type="number" class="w3-input w3-border w3-white" id="amount_max" name="amount_max" placeholder="5">
				</div>
				<div class="w3-third">
					<label class="w3-label w3-text-teal">Amount-Alert:</label>
					<input type="number" class="w3-input w3-border w3-white" id="amount_alert" name="amount_alert" placeholder="5">
				</div>
            </div>
            </p>
            <p>
            <button class="w3-btn w3-round w3-teal">Submit</button>
            <a href="{{ URL::previous() }}" class="w3-btn w3-round w3-blue" role="button">Back</a>
            </p>			
        </form>
    </div>
    <div class="w3-col s4 w3-center">
    <p></p>
    </div>
</div>
@endsection