@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row w3-responsive">
			<div class="w3-col m2 s2" style="width:20%"><p></p></div>
			<div class="w3-col m8 s8" style="width:60%">
				<br>
				<h3 class="w3-text-blue">บริหารจัดการรายการ Request</h3>
				<br>
				<br>
				<table class="w3-table w3-bordered w3-hoverable w3-margin-top w3-centered">
					<thead>
					  	<tr class="w3-blue">
						    <th>ลำดับ</th>
						    <th>รหัสลูกค้า</th>
						    <th>ชื่อลูกค้า</th>
						    <th>สินค้า</th>
						    <th>จำนวน</th>
						    <th>จัดการ</th>
					  	</tr>
				  	</thead>
				  	<tbody>
				  		{{--*/ $i=1 /*--}}
				  		@foreach ($data as $s )
					  	<tr>
					  		<td>{{ $i }}</td>
					      	<td>C{{ sprintf('%04u', $s->Customer->id) }}</td>
					      	<td>{{ $s->Customer->name }}</td>
					      	<td>{{ $s->Product->name}}</td>
					      	<td>{{ $s->amount }}</td>
					      	<td>
					      		<a href="{{url('/customer/manage/')}}/{{$s->id}}">
					                <img src="{{url('img/edit.png')}}" style="width: 20px">
								</a>
					      	</td>
					    </tr>
					    {{--*/ $i++ /*--}}
					   	@endforeach
				    </tbody>
				  </table>				
				  <br>
			</div>
			<div class="w3-col m2 s2" style="width:20%"><p></p></div>
		</div>
</div>
@endsection