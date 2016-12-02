@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row">
	    <div class="w3-col" style="width:20%"><p></p></div>
	    <div class="w3-col" style="width:60%">
	    	<form class="w3-container" role="form" method="POST" action="{{ url('/delivery/search') }}" accept-charset="utf-8">
	    		@if($team_name == NULL)
					<label class="w3-label w3-text-teal">Select team:</label>
					<p>
					<select class="w3-input w3-border w3-white" id="team" name="team" required="">
						@foreach (App\Team::all() as $team)
							<option value="{{$team->id}}">{{$team->name}}</option>
						@endforeach
					</select>
					</p><p>
					<button class="w3-btn w3-round w3-teal">Submit</button>
					</p>
				@else
					<p> 
					<a href="{{ URL::previous() }}" class="w3-btn w3-round w3-blue" role="button">Back</a>
					<a href="{{ url('delivery/location') }}/{{$team_id}}" class="w3-btn w3-round w3-green" target="_blank" role="button">Location View</a>
					</p>
				@endif

				@if($data)
		    	<table class="w3-table w3-striped w3-bordered w3-card-4 w3-animate-opacity">
		    		<thead>
		    			<tr class="w3-teal">
		    				<th width="5%">Code</th>
							<th width="20%">Name</th>
							<th width="15%">Address</th>
							<th width="10%">Phone</th>
							<th width="20%">Zone</th>
							<th width="10%">Team</th>
							<th width="15%">Group</th>
							<th>Amount</th>
							<th>Price</th>
							<th>Status</th>
							<th>Vat</th>
							<th>Type</th>
							<th>Map</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach ($data as $x)
							@foreach ($x->Customer as $s)
							<tr>
								<td>{{$s->id}}</td>
								<td>{{$s->name}}</td>
								<td>@if($s->address)
										{{$s->address}}
									@else
										-
									@endif
								</td>
								<td>@if($s->tel)
										{{$s->tel}}
									@else
										-
									@endif
								</td>
								<td>{{$s->Zone->name}} ({{$s->Zone->detail}})</td>
								<td>{{$s->Zone->Team->name}}</td>
								<td>{{$s->Group->name}} ({{$s->Group->detail}})</td>
								<td>{{$s->amount}}</td>
								<td>{{$s->price}}</td>
								<td>{{$s->status}}</td>
								<td>
									@if($s->vat == "no")
										No
									@else
										Yes
									@endif
								</td>
								<td>
									@if($s->type == "cash")
										Cash
									@else
										Credit
									@endif
								</td>
								<td>
									@if($s->lat !=0 && $s->long)
										<a href="{{URL::asset('/customer/map/')}}/{{$s->id}}" target="_blank"><i class="fa fa-map-marker"></i></a>
									@else
										<span class="fa fa-remove"></span>
									@endif
								</td>
							</tr>
							@endforeach
						@endforeach
		    		</tbody>
		    	</table>
		    	@endif
	    	</form>
	    </div>
	    <div class="w3-col" style="width:20%"><p></p></div>
	</div>
</div>
@endsection