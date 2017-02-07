@extends('layouts.app')
@section('content')
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m1 s1"><p></p></div>
		<div class="w3-col l10 m10 s12">
			<br><br>
			<h3 class="w3-text-blue">บริหารจัดการลูกค้า</h3>
			<a href="{{url('/customer/create')}}"><button class="w3-btn w3-round-large w3-blue w3-right">เพิ่มลูกค้า</button></a>
			<br><br>
			<a href="javascript:void(0)" onclick="openCustomer(event, 'All');">
			<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-blue">ลูกค้าทั้งหมด</div>
			</a>
			<a href="javascript:void(0)" onclick="openCustomer(event, 'Vat');">
			<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">ต้องการ Vat</div>
			</a>
			<a href="javascript:void(0)" onclick="openCustomer(event, 'NoVat');">
			<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">ไม่ต้องการ Vat</div>
			</a>

			<br><br>

			<div id="All" class="customer" style="display:block">
				<div class="w3-responsive">
					@if($customer != '[]')
					<table class="w3-table-all w3-margin-top">
						<thead>
							<tr class="w3-blue">
								<th>ลำดับ</th>
								<th>รหัสลูกค้า</th>
								<th>ชื่อ</th>
								<th>ที่อยู่</th>
								<th>เบอร์ติดต่อ</th>
								<th>Vat</th>
								<th>ทีม</th>
								<th>โซน</th>
								<th>ที่ตั้ง</th>
								<th>แก้ไข</th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $i=1 /*--}}
							@foreach($customer as $s)
							<tr>
								<td>{{ $i }}</td>
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
								<td>{{ $s->vat }}%</td>
								<td>
									@if($s->team_id)
										{{ $s->Team->name }}
									@else
										ไม่ระบุ
									@endif
								</td>
								<td>{{ $s->Zone->name }}</td>
			                    <td>
									@if($s->lat !=0 && $s->long)
										<a href="{{URL::asset('/customer/location/')}}/{{$s->id}}" target="_blank">
					                    	<img src="{{url('img/hasLocation.png')}}" alt="" style="width: 20px">
										</a>
									@else
				                    	<img src="{{url('img/noLocation.png')}}" alt="" style="width: 20px">
									@endif
								</td>
								<td>
									<a href="{{url('/customer/store/')}}/{{$s->id}}">
					                    <img src="{{url('img/edit.png')}}" style="width: 20px">
									</a>
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

			<div id="Vat" class="customer" style="display:none">
				<div class="w3-responsive">
					@if($vat != '[]')
					<table class="w3-table-all w3-margin-top">
						<thead>
							<tr class="w3-blue">
								<th>ลำดับ</th>
								<th>รหัสลูกค้า</th>
								<th>ชื่อ</th>
								<th>ที่อยู่</th>
								<th>เบอร์ติดต่อ</th>
								<th>Vat</th>
								<th>ทีม</th>
								<th>โซน</th>
								<th>ที่ตั้ง</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $i=1 /*--}}
							@foreach($vat as $s)
							<tr>
								<td>{{ $i }}</td>
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
								<td>{{ $s->vat }}%</td>
								<td>
									@if($s->team_id)
										{{ $s->Team->name }}
									@else
										ไม่ระบุ
									@endif
								</td>
								<td>{{ $s->Zone->name }}</td>
			                    <td>
									@if($s->lat !=0 && $s->long)
										<a href="{{URL::asset('/customer/location/')}}/{{$s->id}}" target="_blank">
						                    <img src="{{url('img/hasLocation.png')}}" alt="" style="width: 20px">
										</a>
									@else
				                    	<img src="{{url('img/noLocation.png')}}" alt="" style="width: 20px">
									@endif
								</td>
								<td>
									<a href="{{url('/customer/store/')}}/{{$s->id}}">
					                    <img src="{{url('img/edit.png')}}" style="width: 20px">
									</a>
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

			<div id="NoVat" class="customer" style="display:none">
				<div class="w3-responsive">
					@if($novat != '[]')
					<table class="w3-table-all w3-margin-top">
						<thead>
							<tr class="w3-blue">
								<th>ลำดับ</th>
								<th>รหัสลูกค้า</th>
								<th>ชื่อ</th>
								<th>ที่อยู่</th>
								<th>เบอร์ติดต่อ</th>
								<th>ทีม</th>
								<th>โซน</th>
								<th>ที่ตั้ง</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $i=1 /*--}}
							@foreach($novat as $s)
							<tr>
								<td>{{ $i }}</td>
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
									@if($s->team_id)
										{{ $s->Team->name }}
									@else
										ไม่ระบุ
									@endif
								</td>
								<td>{{ $s->Zone->name }}</td>
			                    <td>
									@if($s->lat !=0 && $s->long)
										<a href="{{URL::asset('/customer/location/')}}/{{$s->id}}" target="_blank">
						                    <img src="{{url('img/hasLocation.png')}}" alt="" style="width: 20px">
										</a>
									@else
				                    	<img src="{{url('img/noLocation.png')}}" alt="" style="width: 20px">
									@endif
								</td>
								<td>
									<a href="{{url('/customer/store/')}}/{{$s->id}}">
					                    <img src="{{url('img/edit.png')}}" style="width: 20px">
									</a>
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