@extends('layouts.app')
@section('content')
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m1 s1" style="width:20%"><p></p></div>
		<div class="w3-col l10 m10 s10" style="width:60%">
			<br><br>
			<a href="javascript:void(0)" onclick="openTeam(event, 'Member');">
			<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-blue">สมาชิก</div>
			</a>
			<a href="javascript:void(0)" onclick="openTeam(event, 'Zone');">
			<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">โซน</div>
			</a>

			<br><br>

			<div id="Member" class="w3-container team" style="display:block">
				<div class="w3-responsive">
					<a href="{{url('/team/member/add')}}"><button class="w3-btn w3-round-large w3-blue w3-right">เพิ่มสมาชิก</button></a>
					@foreach($team as $teams)
					<h3>ทีม {{ $teams->name }}</h3>
					<br>
					<ul class="w3-ul w3-card-4">
						@foreach($teams->User as $users)
							<li class="w3-padding-16">
							<span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>
							@if($users->pivot->role == "หัวหน้าทีม")
								<img src="{{ url('img/avatar_head.png') }}" class="w3-left w3-circle w3-margin-right" style="width:60px">
							@else
								<img src="{{ url('img/avatar.png') }}" class="w3-left w3-circle w3-margin-right" style="width:60px">
							@endif
							<span class="w3-xlarge">{{ $users->name }}</span><br>
							<span>{{ $users->pivot->role }}</span>
							</li>
						@endforeach
					</ul>
					@endforeach
				</div>
			</div>

			<div id="Zone" class="w3-container team" style="display:none">
				<div class="w3-responsive">
					<a href="{{url('/team/member/zone/add')}}"><button class="w3-btn w3-round-large w3-blue w3-right">เพิ่มโซน</button></a>
					@foreach($team as $teams)
					<h3>ทีม {{ $teams->name }}</h3>
					<br>
					<ul class="w3-ul w3-card-4">
						@foreach($teams->Zone as $zones)
							<li class="w3-padding-16">
							<span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>
							<span class="w3-large">{{ $zones->name }}</span><br>
							</li>
						@endforeach
					</ul>
					@endforeach
				</div>
			</div>

		</div>
		<div class="w3-col m1 s1" style="width:20%"><p></p></div>
	</div>
</div>

<script>
function openTeam(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("team");
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