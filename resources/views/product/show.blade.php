@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row w3-responsive">
			<div class="w3-col m2 s2"><p></p></div>
			<div class="w3-col m8 s8">
				<br>
				<h3 class="w3-text-blue">บริหารจัดการสินค้า</h3>
				<br>
				<a href="{{URL::asset('/product/create')}}" class="w3-btn w3-border w3-round-large w3-blue w3-right">เพิ่มสินค้า</a>
				<br><br>
				<table class="w3-table w3-bordered w3-hoverable w3-margin-top w3-centered">
					<thead>
					  	<tr class="w3-blue">
						    <th>รหัสสินค้า</th>
						    <th>ชื่อสินค้า</th>
						    <th>ปริมาณ</th>
						    @if(Auth::user()->level != 'user')
						    	<th>แก้ไข</th>
						    	<th>ลบ</th>
							@endif
					  	</tr>
				  	</thead>
				  	<tbody>
				  		@foreach ($product as $s )
					  	<tr>
					      	<td>P{{ sprintf('%04u', $s->id) }}</td>
					      	<td>{{ $s->name}}</td>
					      	<td>
					      		<div class="w3-progress">
								    @if($s->amount >= $s->amount_alert)
									<div id="myBar" class="w3-center w3-text-white w3-green w3-round-xlarge" style="width:{{($s->amount/$s->amount_max)*100}}%">
										&nbsp&nbsp{{$s->amount}}/{{$s->amount_max}}
									</div>
									@else
										<div id="myBar" class="w3-center w3-text-white w3-red w3-round-xlarge" style="width:{{($s->amount/$s->amount_max)*100}}%">
											&nbsp&nbsp{{$s->amount}}/{{$s->amount_max}}
										</div>
									@endif
								</div>
					      	</td>
					      	<td>
					      		<a href="{{url('/product/store/')}}/{{$s->id}}">
					      			<img src="img/edit.png" style="width:20px">
					      		</a>
					      	</td>
					      	<td>
					      		<a href="{{URL::asset('/product/delete/')}}/{{$s->id}}" onclick="return confirm('Do you really want to submit the form?');">
					      			<img src="img/delete.png" style="width:20px">
					      		</a>
					      	</td>
					    </tr>
					   	@endforeach
				    </tbody>
				  </table>				
				  <br>
			</div>
			<div class="w3-col m2 s2"><p></p></div>
		</div>
</div>
@endsection