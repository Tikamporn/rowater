@extends('layouts.app')
@section('content')
<div class="w3-row">
	<form class="w3-container" role="form" method="POST" action="{{ url('/customer/storeAction') }}" onsubmit="return confirm('Do you really want to submit the form?');">
		 {!! csrf_field() !!}
			<div class="w3-col m1 s1"><p></p></div>
			<div class="w3-col m10 s10 w3-large">
				<br><br>
				<div class="w3-bottombar w3-border-blue">
					<h2 class="w3-text-blue">แก้ไขข้อมูลลูกค้า</h2>
				</div>
				<br>
				<h3 class="w3-container w3-text-blue">ข้อมูลลูกค้า</h3>
					<br>
					<table class="w3-table">
						<tr>
                <td class="w3-right">รหัสลูกค้า :</td>
                <input type="hidden" class="w3-input w3-border w3-white" id="id" name="id" readonly value="{{$customer->id}}">
                <td><input class="w3-border w3-round w3-input w3-left w3-blue" name="customer_id" type="text" value="C{{ sprintf('%04u', $customer->id) }}" readonly></td>

                <td class="w3-right"><label class="w3-text-red"><b>*</b></label>ชื่อลูกค้า :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="name" type="text" value="{{ $customer->name }}" required></td>
              </tr>

              <tr>
                <td class="w3-right"><label class="w3-text-red"><b>*</b></label>โซน :</td>
                <td>
                    <select class="w3-select w3-border w3-left" name="zone" required>
                      @if($customer->zone_id != NULL)
                      <option value="{{ $customer->zone_id }}">{{ $customer->Zone->name }}</option>
                      @endif
                      @if($zone != NULL)
                      @foreach($zone as $zones)
                      	@if($customer->zone_id != $zones->id)
                      		<option value="{{ $zones->id }}">{{ $zones->name }}</option>
                      	@endif
                      @endforeach
                    @endif
                    </select>
                </td>

                <td class="w3-right"><label class="w3-text-red"><b>*</b></label>ทีม :</td>
                <td>
                  <select class="w3-select w3-border w3-left" name="team" required>
                      @if($customer->team_id != NULL)
                      <option value="{{ $customer->team_id }}">{{ $customer->Team->name }}</option>
                      @endif
                      @if($team != NULL)
                      
                      @foreach($team as $teams)
                        @if($customer->team_id != $teams->id)
                          <option value="{{ $teams->id }}">{{ $teams->name }}</option>
                        @endif
                      @endforeach
                      @endif
                  </select>
                </td>
            </tr>

            <tr>
                <td class="w3-right">สถานะ :</td>
                <td>
                  @if($customer->status == 1)
                    <select class="w3-select w3-border w3-round w3-left" name="status">
                      <option value="1" class="w3-green">ใช้บริการ</option>
                      <option value="0" class="w3-red">ยกเลิก</option>
                    </select>
                  @elseif($customer->status == 0)
                    <select class="w3-select w3-border w3-round w3-left w3-red" name="status">
                      <option value="0" class="w3-red">ยกเลิก</option>
                      <option value="1" class="w3-green">ใช้บริการ</option>
                    </select>
                  @endif
                </td>

                <td class="w3-right"><label class="w3-text-red"><b>*</b></label>กลุ่มลูกค้า :</td>
                <td> 
                  <select class="w3-select w3-border w3-left" name="group">
                    @if($customer->group_id != NULL)
			              <option value="{{ $customer->group_id }}">{{ $customer->Group->name }}</option>
                    @endif
                    @if($group != NULL)
              			@foreach($group as $groups)
              				@if($customer->group_id != $groups->id)
              					<option value="{{ $groups->id }}">{{ $groups->name }}</option>
              				@endif
              			@endforeach
                    @endif
                  </select>
                </td>
            </tr>

              <tr>
                <td class="w3-right"><label class="w3-text-red"><b>*</b></label>Payment Term :</td>
                <td>
                  <select class="w3-select w3-border w3-round w3-left" name="type">
                  	@if($customer->type == "cash")
            				<option value="cash">เงินสด</option>
            				<option value="credit">เครดิต</option>
            			@else
            				<option value="credit">เครดิต</option>
            				<option value="cash">เงินสด</option>
            			@endif
                  </select>
                </td>

                <td class="w3-right">รอบวันที่จ่ายเงิน :</td>
                <td>
                  <div class="w3-row">
                  	@if($customer->pay_date == 1)
                    	<div class="w3-col m1 s1"><p></p></div>
                      	<div class="w3-col m2 s2"><input type="radio" name="date" value="1" checked class="w3-radio"></div>
                     	<div class="w3-col m1 s1">1</div>
                      	<div class="w3-col m2 s2"><p></p></div>
                      	<div class="w3-col m2 s2"><input type="radio" name="date" value="25" class="w3-radio"></div>
                      	<div class="w3-col m1 s1">25</div>
                    @else
                    	<div class="w3-col m1 s1"><p></p></div>
                      	<div class="w3-col m2 s2"><input type="radio" name="date" value="1" class="w3-radio"></div>
                     	<div class="w3-col m1 s1">1</div>
                      	<div class="w3-col m2 s2"><p></p></div>
                      	<div class="w3-col m2 s2"><input type="radio" name="date" value="25" checked class="w3-radio"></div>
                      	<div class="w3-col m1 s1">25</div>
                    @endif
                  </div>   
                </td>
             </tr>  

             <tr>
                <td class="w3-right">Deposit (Unit) :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="unit" type="text" value="{{ $customer->deposit_unit }}"></td>

                <td class="w3-right">Deposit (Baht) :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="price" type="text" value="{{ $customer->price }}"></td>
              </tr>

            <tr>
                <td class="w3-right">Vat :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="vat" type="number" value="{{ $customer->vat }}"></td></td>
                <td class="w3-right">Ship Number :</td>
                <td ><input class="w3-border w3-round w3-input w3-left" name="shipnumber" type="text" value="{{ $customer->ship_number }}"></td>
            </tr>

            <tr>
                <td class="w3-right">Latituge :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="latitude" type="text" value="{{ $customer->lat }}"></td>

                <td class="w3-right">Longitude :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="longtitude" type="text" value="{{ $customer->long }}"></td>
            </tr>
					</table>
					<br>
				<h3 class="w3-container w3-text-blue">ที่อยู่ลูกค้า</h3>
					<br>
					<table class="w3-table">
						<tr>
                <td class="w3-right">บ้านเลขที่ :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_no" type="text" value="{{ $customer->addr_no }}"></td>

                <td class="w3-right">หมู่ที่ :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_village_no" type="text" value="{{ $customer->addr_village_no }}"></td>
            </tr>

            <tr>
                <td class="w3-right">ชื่อหมู่บ้าน :</td>
                <td><input class="w3-border w3-round w3-input" name="addr_village" type="text" value="{{ $customer->addr_village }}"></td>

                <td class="w3-right">ตรอก/ซอย :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_soi" type="text" value="{{ $customer->addr_soi }}"></td>
            </tr>

            <tr>
                <td class="w3-right">ถนน :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_road" type="text" value="{{ $customer->addr_road }}"></td>

                <td class="w3-right">ตำบล/แขวง :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_subdistrict" type="text" value="{{ $customer->addr_subdistrict }}"></td>
            </tr>

            <tr>
                <td class="w3-right">อำเภอ/เขต :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_district" type="text" value="{{ $customer->addr_district }}"></td>

                <td class="w3-right">จังหวัด :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_province" type="text" value="{{ $customer->addr_province }}"></td>
            </tr>

            <tr>
                <td class="w3-right">รหัสไปรษณีย์่ :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="addr_postcode" type="number" value="{{ $customer->addr_postcode }}"></td>

                <td class="w3-right"><label class="w3-text-red"><b>*</b></label>เบอร์โทร :</td>
                <td><input class="w3-border w3-round w3-input w3-left" name="tel" type="number" value="{{ $customer->tel }}" required></td>
            </tr>
					</table>
					<br><br><br>
				</div>
				<div class="w3-col m4 s4"><p></p></div>
				<div class="w3-col m4 s4">
					<button class="w3-btn w3-round w3-green w3-xlarge w3-padding-xlarge w3-left">บันทึก</button>
					<a href="{{ URL::previous() }}" class="w3-btn w3-round w3-red w3-xlarge w3-padding-xlarge w3-right" role="button">ย้อนกลับ</a>
				</div>
				<div class="w3-col m4 s4"><p></p></div>
			</div>
			<div class="w3-col m1 s1"><p></p></div>
	</form>
</div>
@endsection
