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
							<th>ลบ</th>
						</tr>
					</thead>
					<tbody>
						{{--*/ $i=1 /*--}} 
						@foreach($zone as $zones)
						<tr>
							<td>{{$i}}</td>
							<td class="w3-tooltip">
								Z{{ sprintf('%04u', $zones->id) }}
								<span class="w3-text w3-tag w3-blue" style="position:absolute;left:0;bottom:5px">
									<a href="{{url('/zone/store/')}}/{{$zones->id}}">T{{ sprintf('%04u', $zones->id) }}</a>
								</span>
							</td>
							<td class="w3-tooltip">
								{{$zones->name}}
								<span class="w3-text w3-tag w3-blue" style="position:absolute;left:0;bottom:5px">
									<a href="{{url('/zone/store/')}}/{{$zones->id}}">{{$zones->name}}</a>
								</span>
							</td>
							<td class="w3-tooltip">
								{{ str_limit($zones->detail, $limit = 10, $end = '') }}
								<span class="w3-text w3-tag w3-blue" style="position:absolute;left:0;bottom:5px">
									{{$zones->detail}}
								</span>
							</td>
							<td>{{$zones->created_at}}</td>
							<td><a href="{{URL::asset('/zone/delete/')}}/{{$zones->id}}" onclick="return confirm('Do you really want to submit the form?');">
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