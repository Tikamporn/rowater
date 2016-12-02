@extends('layouts.app')
@section('content')
	@if(Auth::user()->name != NULL)
	<div class="w3-container w3-center">
		<br><br>
		<div class="w3-col" id="map" style="width:100%;height:600px;"></div>
		<script type="text/javascript">

		    var markers = <?php echo $data; ?>;
		    window.onload = function () {
		        LoadMap();
		    }
		    function LoadMap() {
		        var mapOptions = {
		            center: new google.maps.LatLng(7.9107391,98.3337983),
		            zoom: 13,
		            mapTypeId: google.maps.MapTypeId.ROADMAP
		        };
		        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		 
		        //Create and open InfoWindow.
		        var infoWindow = new google.maps.InfoWindow();
		 
		        for (var i = 0; i < markers.length; i++) {
		            var data = markers[i];
		            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
		            var marker = new google.maps.Marker({
		                position: myLatlng,
		                map: map,
		                title: data.title
		            });
		 
		            //Attach click event to the marker.
		            (function (marker, data) {
		                google.maps.event.addListener(marker, "click", function (e) {
		                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
		                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + "<B>" + data.title + "</B>" + "<br>ที่อยู่ : " + data.description + "<br> ติดต่อ : " + data.tel + "</div>");
		                    infoWindow.open(map, marker);
		                });
		            })(marker, data);
		        }

				var circle = new google.maps.Circle({
					map: map,
					radius: 5000,    
					fillColor: '#ffffff'
				});
				circle.bindTo('center', marker, 'position');
		    }
		</script>
	</div>
	@endif
@endsection