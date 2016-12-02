@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row w3-animate-opacity">
  <div class="w3-col w3-container" style="width:5%"><p></p></div>
  <div class="w3-col w3-container" style="width:90%">
    <div class="w3-border w3-border-indigo w3-round-large">
    <div class="w3-center w3-indigo w3-round-large" style="width:30%; font-size:25px">รายการลูกค้าทั้งหมด</div>

      <div class="w3-row">
        <div class="w3-col w3-container" style="width:5%"><p></p></div>
        <div class="w3-col w3-container" style="width:90%">
          <a href="{{url('/customer/add')}}"><button class="w3-btn w3-round-large w3-white w3-border w3-clear w3-right" style="width: 200px; " ><img src="{{url('edit/add.png')}}" alt="" style="width: 20px"> New Customer </button></a>
            <br><br>        
            <table class="w3-table-all w3-centered">
              <thead>
                <tr class="w3-blue">
	                <th width="5%">Code</th>
					<th width="20%">Name</th>
					<th width="20%">Address</th>
					<th width="5%">Phone</th>
					<th width="5%">Zone</th>
					<th width="5%">Team</th>
					<th width="5%">Group</th>
					<th width="5%">Amount</th>
					<th width="5%">Price</th>
					<th width="5%">Status</th>
					<th width="5%">Vat</th>
					<th width="5%">Type</th>
					<th width="5%">Map</th>
					@if(Auth::user()->level != 'user')
						<th width="5%">Edit</th>
					@endif
                </tr>
              </thead>
              @foreach ($customer as $s )
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
							<a href="{{URL::asset('/customer/map/')}}/{{$s->id}}" target="_blank">
								<button class="w3-btn w3-round-large w3-white w3-border w3-right" style="width: 70px;">
			                    	<img src="{{url('img/hasLocation.png')}}" alt="" style="width: 20px">
			                    </button>
							</a>
						@else
	                    	<img src="{{url('img/noLocation.png')}}" alt="" style="width: 20px">
						@endif
					</td>
	                <td>
<!-- 	                    <button class="w3-btn w3-round-large w3-white w3-border w3-right" style="width: 70px; ">
	                    	<img src="edit/delete.png" alt="" style="width: 20px; ">
	                    </button> -->

	                    @if(Auth::user()->level != 'user')
	                    <a href="{{url('/customer/edit/')}}/{{$s->id}}">
		                    <button class="w3-btn w3-round-large w3-white w3-border w3-right" style="width: 70px;">
		                    	<img src="{{url('edit/edit.png')}}" alt="" style="width: 20px">
		                    </button>
	                    </a> 
	                    @endif

<!-- 	                    <a href="{{url('#')}}">
		                    <button class="w3-btn w3-round-large w3-white w3-border w3-right" style="width: 70px;">
		                    	<img src="{{url('edit/find.png')}}" alt="" style="width: 20px">
		                    </button>
	                    </a> -->

	                </td>
	              </tr>
              @endforeach
            </table>
            <br>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection