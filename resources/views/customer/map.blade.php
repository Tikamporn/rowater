@extends('layouts.app')
@section('content')
	<script>
		var myCenter=new google.maps.LatLng(<?php echo $customer->lat; ?>,<?php echo $customer->long; ?>);

		var contentString = '<div id="content">'+ '<h4><?php echo $customer->name; ?></h4>' +
							'<p>Address : <?php echo $customer->address; ?></p>' +
							'<p>Tel : <?php echo $customer->tel; ?></p>' +
							'<p>Team : <?php echo $customer->Zone->Team->name; ?></p>' +
							'</div>';

		function initialize()
		{
			var mapProp = {
			  	center:myCenter,
			  	zoom:15,
			  	mapTypeId:google.maps.MapTypeId.ROADMAP,
			  	// disableDefaultUI:true
			};

			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker=new google.maps.Marker({
			  	position:myCenter,
			});

			marker.setMap(map);

			var infowindow = new google.maps.InfoWindow({
			  	content: contentString,
			  	maxWidth: 200
			  });

			infowindow.open(map,marker);

			marker.addListener('click', function() {
	        	infowindow.open(map, marker);
	        });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

	@if(Auth::user()->name != NULL)
	<div class="w3-container w3-center">
		<br><br>
		<div class="w3-col" id="googleMap" style="width:100%;height:500px;"></div>
	</div>
	@endif
@endsection


