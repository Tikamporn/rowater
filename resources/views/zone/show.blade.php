@extends('layouts.app')
@section('content')
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m1 s1" style="width:20%"><p></p></div>
		<div class="w3-col l10 m10 s10" style="width:60%">
			<br><br>
			<div class="w3-responsive">
				<h3 class="w3-text-blue">บริหารจัดการโซน</h3>
				<a href="{{url('/zone/create')}}"><button class="w3-btn w3-round-large w3-blue w3-right">เพิ่มโซน</button></a>
				<br><br>
				<table class="w3-table-all w3-margin-top">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>รหัสโซน</th>
							<th>ชื่อโซน</th>
							<th>รายละเอียด</th>
							<th>วันที่สร้าง</th>
							<th>แก้ไข</th>
							<th>ลบ</th>
						</tr>
					</thead>
					<tbody>
						{{--*/ $i=1 /*--}} 
						@foreach($zone as $zones)
						<tr>
							<td>{{$i}}</td>
							<td>Z{{ sprintf('%04u', $zones->id) }}</td>
							<td>{{$zones->name}}</td>
							<td>{{ str_limit($zones->detail, $limit = 10, $end = '') }}</td>
							<td>{{$zones->created_at}}</td>
							<td>
								<a href="{{url('/zone/store/')}}/{{$zones->id}}">
					      			<img src="img/edit.png" style="width:20px">
					      		</a>
					      	</td>
							<td>
								<a href="{{URL::asset('/zone/delete/')}}/{{$zones->id}}" onclick="return confirm('Do you really want to submit the form?');">
					      			<img src="img/delete.png" style="width:20px">
					      		</a>
					      	</td>
						</tr>
						{{--*/ $i++ /*--}} 
						@endforeach
					</tbody>
				</table>
			</div>
		<div class="w3-col m1 s1" style="width:20%"><p></p></div>
	</div>
</div>
@endsection