@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row">
	    <div class="w3-col" style="width:20%"><p></p></div>
	    <div class="w3-col" style="width:60%">
	    	@if(Auth::user()->level != 'user')
	    			<h4><a href="{{URL::asset('/product/add')}}" class="w3-btn w3-round w3-green" role="button">New Product</a></h4>
	    	@endif
	    	<table class="w3-table w3-bordered w3-card-4 w3-animate-opacity">
	    		<thead>
	    			<tr class="w3-teal">
	    				<th width="10%">Code</th>
						<th width="20%">Product Name</th>
						<th width="60%">Amount</th>
						@if(Auth::user()->level != 'user')
							<th width="5%">Edit</th>
							<th width="5%">Delete</th>
						@endif
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach ($product as $s )
	    				<tr>
		    				<td>{{$s->id}}</td>
							<td>{{$s->name}}</td>
							<td>
								<div class="w3-progress-container w3-round-xlarge">
									@if($s->amount >= $s->amount_alert)
										<div id="myBar" class="w3-progressbar w3-green w3-round-xlarge" style="width:{{($s->amount/$s->amount_max)*100}}%">
											&nbsp&nbsp{{$s->amount}}/{{$s->amount_max}}
										</div>
									@else
										<div id="myBar" class="w3-progressbar w3-red w3-round-xlarge" style="width:{{($s->amount/$s->amount_max)*100}}%">
											&nbsp&nbsp{{$s->amount}}/{{$s->amount_max}}
										</div>
									@endif
								</div><br>
							</td>
							@if(Auth::user()->level != 'user')
								<td><a href="{{URL::asset('/product/edit/')}}/{{$s->id}}"><span class="fa fa-edit"></span></a></td>
								<td><a href="{{URL::asset('/product/delete/')}}/{{$s->id}}"><span class="fa fa-trash"></span></a></td>
							@endif
						</tr>
					@endforeach
	    		</tbody>
	    	</table>
	    </div>
	    <div class="w3-col" style="width:20%"><p></p></div>
	</div>
</div>
@endsection