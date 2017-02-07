@extends('layouts.app')
@section('content')
<div class="w3-row">
	<div class="w3-col m4 s4"><p></p></div>
	<div class="w3-col m5 s5 w3-round-xlarge">
		<br><br>
		<h3 class="w3-text-blue">ลงทะเบียนโซน</h3>
		<br>
		<form class="w3-container" role="form" method="POST" action="{{ url('/zone/createAction') }}" accept-charset="utf-8" onsubmit="return confirm('Do you really want to submit the form?');">
			<table class="w3-table">
			  	<tr>
	                <td class="w3-right">ชื่อ :</td>
	                <td><input class="w3-border w3-round w3-input w3-left" name="name" type="text"></td>
				</tr>
				<tr>
	                <td class="w3-right">คำอธิบาย :</td>
	                <td><textarea rows="4" cols="40%" name="detail"></textarea></td>
				</tr>
			</table>				
			<br>
			<button class="w3-btn w3-round w3-green w3-padding-xlarge w3-left" name="submit">บันทึก</button>
	        <a href="{{ URL::previous() }}" class="w3-btn w3-round w3-red w3-padding-xlarge w3-right" role="button">ย้อนกลับ</a>
        </form>
	</div>
	<div class="w3-col m4 s4"><p></p></div>
</div>	
@endsection