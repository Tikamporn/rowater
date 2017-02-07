@extends('layouts.app')
@section('content')
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m1 s1"><p></p></div>
		<div class="w3-col l10 m10 s12">
			<br><br>
			<h3 class="w3-text-blue">รายการขนส่งสินค้า</h3>
			<br><br>

			<div>
				<div class="w3-responsive">
					@if($delivery != '[]')
					<table class="w3-table w3-bordered w3-centered w3-hoverable w3-margin-top">
						<thead>
							<tr class="w3-blue">
								<th>ลำดับ</th>
								<th>รหัสลูกค้า</th>
								<th>ชื่อ</th>
								<th>ที่อยู่</th>
								<th>เบอร์ติดต่อ</th>
								<th>เลือกทีม</th>
								<th>Transaction Date</th>
								<th>Print</th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $i=1 /*--}}
							@foreach($delivery as $s)
							<tr>
								<td>{{ $i }}</td>
								<td>C{{ sprintf('%04u', $s->Customer->id) }}</td>
								<td>{{$s->Customer->name}}</td>
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
								<td>{{$s->Customer->tel}}</td>
								<td>{{$s->Team->name}}</td>
								<td>{{$s->transaction_date}}</td>
								<td>{{$s->count_print}}</td>
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

@endsection