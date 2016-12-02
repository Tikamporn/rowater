@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row">
	    <div class="w3-col" style="width:30%"><p></p></div>
	    <div class="w3-col" style="width:40%">
	    	@if(Auth::user()->level != 'user')
	    		<h4><a href="{{URL::asset('#')}}" class="w3-btn w3-round w3-green" role="button">New Team</a></h4>
	    	@endif
	    	<table class="w3-table w3-bordered w3-card-4 w3-animate-opacity">
	    		<thead>
	    			<tr class="w3-teal">
	    				<th width="10%">ID</th>
						<th width="50%">Name</th>
						<th width="40%">Zone</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php $tmp = NULL; $index = 0; ?>
	    			@foreach($zone as $s)
	    				<tr>
	    					@if($tmp != $s->Team->name)
		    					<td class="w3-blue">{{++$index}}</td>
								<td class="w3-blue">{{$s->Team->name}}</td>
							@else
							<td></td>
							<td></td>
							@endif
							@if($tmp != $s->Team->name)
								<td class="w3-blue">{{$s->name}} ({{$s->detail}})</td>
							@else
								<td>{{$s->name}} ({{$s->detail}})</td>
							@endif
							<?php $tmp = $s->Team->name ?>
	    				</tr>
	    			@endforeach
	    		</tbody>
	    	</table>
	    </div>
	    <div class="w3-col" style="width:30%"><p></p></div>
	</div>
</div>
@endsection