@extends('layouts.app')
@section('content')
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m1 s1"><p></p></div>
		<div class="w3-col l10 m10 s10">
			<br><br>
			<div class="w3-responsive">
				<h3 class="w3-text-blue">บริหารจัดการทีมขนส่ง</h3>
				<a href="{{url('/team/create')}}"><button class="w3-btn w3-round-large w3-blue w3-right">เพิ่มทีมขนส่ง</button></a>
				<br><br>
				<table class="w3-table-all w3-margin-top">
					<thead>
						<tr class="w3-blue">
							<th width="50">ลำดับ</th>
							<th width="100">รหัสทีม</th>
							<th width="40%">ชื่อทีม</th>
							<th width="100">วันที่สร้าง</th>
							@if(Auth::user()->level != 'user')
								<th width="50">แก้ไข</th>
								<th width="50">ลบ</th>
							@endif
						</tr>
					</thead>
					<tbody>
					{{--*/ $i=1 /*--}} 
					@foreach($team as $teams)
						<tr>
							<td>{{$i}}</td>
							<td><a href="{{url('/team/member/')}}/{{$teams->id}}">T{{ sprintf('%04u', $teams->id) }}</a></td>
							<td><a href="{{url('/team/member/')}}/{{$teams->id}}">{{$teams->name}}</a></td>
							<td>{{$teams->created_at}}</td>
							@if(Auth::user()->level != 'user')
								<td>
									<a href="{{url('/team/store/')}}/{{$teams->id}}">
										<img src="{{url('img/edit.png')}}" alt="" style="width: 20px">
				                    </a> 
								</td>
								<td>
									<a href="{{url('/team/delete/team/')}}/{{$teams->id}}" onclick="return confirm('Do you really want to submit the form?');">
										<img src="{{url('img/delete.png')}}" alt="" style="width: 20px">
				                    </a> 
								</td>
		                    @endif
						</tr>
						{{--*/ $i++ /*--}} 
					@endforeach
					</tbody>
				</table>
			</div>
		<div class="w3-col m1 s1"><p></p></div>
	</div>
</div>
@endsection