@extends('layouts.app')
@section('content')
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m1 s1"><p></p></div>
		<div class="w3-col l10 m10 s12">
			<br><br>
			<h3 class="w3-text-blue">บริหารจัดการลูกค้า</h3>
			<br><br>
			<a href="javascript:void(0)" onclick="openCustomer(event, 'Customer');">
			<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-blue">ลูกค้าประจำวันนี้</div>
			</a>
			<a href="javascript:void(0)" onclick="openCustomer(event, 'Request');">
			<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">ลูกค้า Request รายวัน</div>
			</a>

			<br><br>

			<form role="form" method="POST" action="{{ url('/management/createAction') }}" accept-charset="utf-8" onsubmit="return confirm('Do you really want to submit the form?');">

			<div id="Customer" class="customer" style="display:block">
				<div class="w3-responsive">
					@if($customer != '[]')
					<table class="w3-table w3-bordered w3-centered w3-hoverable w3-margin-top">
						<thead>
							<tr class="w3-blue">
								<th>ลำดับ</th>
								<th>รหัสลูกค้า</th>
								<th>ชื่อ</th>
								<th>ที่อยู่</th>
								<th>เบอร์ติดต่อ</th>
								<th>เลือกทีม</th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $i=1 /*--}}
							@foreach($customer as $s)
							<tr>
								<td>{{ $i }}</td>
								<input type="hidden" name="customer_id[]"" value="{{$s->id}}">
								<input type="hidden" name="team_id[]"" value="{{$s->team_id}}">
								@if($s->status == 0)
									<td class="w3-text-red">
										C{{ sprintf('%04u', $s->id) }}
									</td>
								@elseif($s->status == 1)
									<td>
										C{{ sprintf('%04u', $s->id) }}
									</td>
								@endif
								<td>{{ $s->name}}</td>
								<td class="w3-tooltip">
									@if($s->addr_subdistrict) 
										ตำบล{{ $s->addr_subdistrict }}
									@endif

									@if($s->addr_district) 
										อำเภอ{{ $s->addr_district }}
									@endif

									@if($s->addr_province) 
										จังหวัด{{ $s->addr_province }}
									@endif

									<span class="w3-text w3-tag w3-small w3-round-xlarge w3-blue" style="position:absolute;left:0;bottom:10px">
										@if($s->addr_no) 
											เลขที่ {{ $s->addr_no }}
										@endif

										@if($s->addr_village_no) 
											หมู่ที่ {{ $s->addr_village_no }}
										@endif

										@if($s->addr_village) 
											หมู่บ้าน {{ $s->addr_village }}
										@endif

										@if($s->addr_road) 
											ถนน{{ $s->addr_road }}
										@endif

										@if($s->addr_soi) 
											ซอย{{ $s->addr_soi }}
										@endif

										@if($s->addr_subdistrict) 
											ตำบล{{ $s->addr_subdistrict }}
										@endif

										@if($s->addr_district) 
											อำเภอ{{ $s->addr_district }}
										@endif

										@if($s->addr_province) 
											จังหวัด{{ $s->addr_province }}
										@endif

										@if($s->addr_postcode) 
											{{ $s->addr_postcode }}
										@endif
									</span>
								</td>
								<td>{{ $s->tel }}</td>
								<td>
									<select class="w3-select" name="option">
									    <option value="{{$s->team_id}}">{{$s->Team->name}}</option>
									    @foreach($team as $teams)
									    	@if($s->team_id != $teams->id)
									    		<option value="{{$teams->id}}">{{$teams->name}}</option>
									    	@endif
									    @endforeach
								  	</select>
								</td>
							</tr>
							{{--*/ $i++ /*--}}
							@endforeach
						</tbody>
					</table>
					@else
						<p align="center">ไม่มีข้อมูล</p>
					@endif
				</div>
			</div>

			<div id="Request" class="customer" style="display:none">
				<div class="w3-responsive">
					@if($customerrequest != '[]')
					<table class="w3-table w3-bordered w3-centered w3-hoverable w3-margin-top">
						<thead>
							<tr class="w3-blue">
								<th>ลำดับ</th>
								<th>รหัสลูกค้า</th>
								<th>ชื่อ</th>
								<th>ที่อยู่</th>
								<th>เบอร์ติดต่อ</th>
								<th>เลือกทีม</th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $i=1 /*--}}
							@foreach($customerrequest as $s)
							<tr>
								<td>{{ $i }}</td>
								<input type="hidden" name="customer_id[]"" value="{{$s->Customer->id}}">
								<input type="hidden" name="team_id[]"" value="{{$s->Customer->team_id}}">
								@if($s->Customer->status == 0)
									<td class="w3-text-red">
										C{{ sprintf('%04u', $s->id) }}
									</td>
								@elseif($s->Customer->status == 1)
									<td>
										C{{ sprintf('%04u', $s->id) }}
									</td>
								@endif
								<td>{{ $s->Customer->name}}</td>
								<td class="w3-tooltip">
									@if($s->Customer->addr_subdistrict) 
										ตำบล{{ $s->Customer->addr_subdistrict }}
									@endif

									@if($s->Customer->addr_district) 
										อำเภอ{{ $s->Customer->addr_district }}
									@endif

									@if($s->Customer->addr_province) 
										จังหวัด{{ $s->Customer->addr_province }}
									@endif

									<span class="w3-text w3-tag w3-small w3-round-xlarge w3-blue" style="position:absolute;left:0;bottom:10px">
										@if($s->Customer->addr_no) 
											เลขที่ {{ $s->Customer->addr_no }}
										@endif

										@if($s->Customer->addr_village_no) 
											หมู่ที่ {{ $s->Customer->addr_village_no }}
										@endif

										@if($s->Customer->addr_village) 
											หมู่บ้าน {{ $s->Customer->addr_village }}
										@endif

										@if($s->Customer->addr_road) 
											ถนน{{ $s->Customer->addr_road }}
										@endif

										@if($s->Customer->addr_soi) 
											ซอย{{ $s->Customer->addr_soi }}
										@endif

										@if($s->Customer->addr_subdistrict) 
											ตำบล{{ $s->Customer->addr_subdistrict }}
										@endif

										@if($s->Customer->addr_district) 
											อำเภอ{{ $s->Customer->addr_district }}
										@endif

										@if($s->Customer->addr_province) 
											จังหวัด{{ $s->Customer->addr_province }}
										@endif

										@if($s->Customer->addr_postcode) 
											{{ $s->Customer->addr_postcode }}
										@endif
									</span>
								</td>
								<td>{{ $s->Customer->tel }}</td>
								<td>
									<select class="w3-select" name="option">
									    <option value="{{$s->Customer->team_id}}">{{$s->Customer->Team->name}}</option>
									    @foreach($team as $teams)
									    	@if($s->Customer->team_id != $teams->id)
									    		<option value="{{$teams->id}}">{{$teams->name}}</option>
									    	@endif
									    @endforeach
								  	</select>
								</td>
							</tr>
							{{--*/ $i++ /*--}}
							@endforeach
						</tbody>
					</table>
					@else
						<p align="center">ไม่มีข้อมูล</p>
					@endif
				</div>
			</div>
			<div class="w3-right">
				<br><br>
				<button class="w3-btn w3-round w3-green w3-xlarge w3-padding-large w3-left">บันทึก</button>
			</div>
			</form>
		</div>
		<div class="w3-col m1 s1"><p></p></div>
	</div>
</div>

<script>
function openCustomer(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("customer");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-blue", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-blue";
}
</script>

@endsection