@extends('layouts.app')
@section('content')
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m4 s4"><p></p></div>
		<div class="w3-col m4 s4 w3-round-xlarge">
			<br><br>
			<h3 class="w3-text-blue">ลงทะเบียนทีม</h3>
			<br>
			<form class="w3-container" role="form" method="POST" action="{{ url('/team/editAction/') }}/{{$id}}" accept-charset="utf-8" onsubmit="return confirm('Do you really want to submit the form?');">
				<table class="w3-table">
				  	<tr>
	                    <td class="w3-right">ชื่อทีม :</td>
	                    <td><input class="w3-border w3-round w3-input w3-left" name="name" type="text" value="{{$team->name}}"></td>
					</tr>
					<tr>
	                    <td class="w3-right">โซน :</td>
	                    <td>
	                    	<button onclick="document.getElementById('zone').style.display='block'" type="button" class="w3-btn w3-green w3-round-large">เลือกโซน</button>
	                    </td>
					</tr>
					<tr>
						<td class="w3-right">หัวหน้าทีม :</td>
	                    <td>
	                    	<button onclick="document.getElementById('header').style.display='block'" type="button" class="w3-btn w3-red w3-round-large">เลือกหัวหน้าทีม</button>
	                    </td>
					</tr>
					<tr>
						<td class="w3-right">สมาชิก :</td>
	                    <td>
	                    	<button onclick="document.getElementById('member').style.display='block'" type="button" class="w3-btn w3-blue w3-round-large">เลือกสมาชิก</button>
	                    </td>
					</tr>
				</table>				
				<br>
				<button class="w3-btn w3-round w3-green w3-padding-xlarge w3-left" name="submit">บันทึก</button>
		        <a href="{{ URL::previous() }}" class="w3-btn w3-round w3-red w3-padding-xlarge w3-right" role="button">ย้อนกลับ</a>

				<div id="zone" class="w3-modal">
				    <div class="w3-modal-content">
				      	<div class="w3-container">
				        	<span onclick="document.getElementById('zone').style.display='none'" class="w3-closebtn">&times;</span>
					        <ul class="w3-ul">
					        	<li>
					        		<h2 class="w3-text-indigo">เลือกโซน</h2>
					        	</li>
						        @foreach($zone as $zones)		      	
				        			<li>
				        				<input class="w3-check" type="checkbox" name="zone[]" <?php if (in_array($zones['id'], $arr_zone)) echo 'checked="checked"'; ?> value="{{$zones->id}}">
										<label class="w3-text-blue w3-large">{{$zones->name}}</label>
									</li>
						        @endforeach
					        </ul>

				      </div><br>
				    </div>
				</div>
				<div id="header" class="w3-modal">
				    <div class="w3-modal-content">
				      	<div class="w3-container">
				        	<span onclick="document.getElementById('header').style.display='none'" class="w3-closebtn">&times;</span>
					        <ul class="w3-ul">
					        	<li>
					        		<h2 class="w3-text-indigo">เลือกหัวหน้าทีม</h2>
					        	</li>
					        	{{--*/ $head=-1; /*--}} 
					        	@if($team != NULL)
						        	@foreach($team->User as $teams)
						        		@if($teams->pivot->role == "หัวหน้าทีม")
					        				<li>
												<input type="radio" name="header" value="{{$teams->id}}" checked class="w3-radio">
												<label class="w3-text-blue w3-large">{{$teams->name}}</label>
											</li>
										{{--*/ $head=$teams->id /*--}} 
										@endif
									@endforeach
								@endif

								@foreach($user as $users)
					        		@if($users->id != $head)
				        				<li>
											<input type="radio" name="header" value="{{$users->id}}"  class="w3-radio">
											<label class="w3-text-blue w3-large">{{$users->name}}</label>
										</li>
									@endif
								@endforeach
					        </ul>
				      </div><br>
				    </div>
				</div>
				<div id="member" class="w3-modal">
				    <div class="w3-modal-content">
				      	<div class="w3-container">
				        	<span onclick="document.getElementById('member').style.display='none'" class="w3-closebtn">&times;</span>
					        <ul class="w3-ul">
					        	<li>
					        		<h2 class="w3-text-indigo">เลือกสมาชิก</h2>
					        	</li>
						        @foreach($user as $users)		      	
				        			<li>
				        				<input class="w3-check" type="checkbox" name="member[]" <?php if (in_array($users['id'], $arr_member)) echo 'checked="checked"'; ?> value="{{$users->id}}">
										<label class="w3-text-blue w3-large">{{$users->name}}</label>
									</li>
						        @endforeach
					        </ul>
				      </div><br>
				    </div>
				</div>
			</form>
		</div>
		<div class="w3-col m4 s4"><p></p></div>
	</div>	
</div>
@endsection