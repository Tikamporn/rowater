@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row w3-responsive">
			<div class="w3-col m2 s2"><p></p></div>
			<div class="w3-col m8 s8">
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
					  	</tr>
				  	</thead>
				  	<tbody>
				  		@if($data != '[]')
					  		{{--*/ $i=1 /*--}}
					  		@foreach ($data as $s )
						  	<tr>
						  		<td>{{ $i }}</td>
						      	<td>C{{ sprintf('%04u', $s->Customer->id) }}</td>
						      	<td>{{ $s->Customer->name }}</td>
						      	<td>{{ $s->Product->name}}</td>
						      	<td>{{ $s->amount }}</td>
						    </tr>
						    {{--*/ $i++ /*--}}
						   	@endforeach
					   	@endif
				    </tbody>
				  </table>
				  @if($data == '[]')
				  	<p align="center">ไม่มีข้อมูล</p>		
				  @endif		
				  <br>
			</div>
			<div class="w3-col m2 s2"><p></p></div>
		</div>
</div>
@endsection