<!DOCTYPE html>
<html>
<head>
	<meta charset = 'utf-8'>
	<script
		src='http://maps.googleapis.com/maps/api/js'>
	</script>
	<style>
		#googleMap {
			width: 100%;
			height: auto;
		}
	</style>
	</head>

	<body>
	<div id='googleMap' style='width:600px;height:400px;'></div>

		<script>
	var mycenter = new google.maps.LatLng({{$lat}},{{$long}});
	function initialize() {
	  var mapProp = {
	    center:mycenter,
	    zoom:17,
	    mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById('googleMap'), mapProp);
	  var marker = new google.maps.Marker({
	  	position: mycenter,
	    animation:google.maps.Animation.BOUNCE,
	  });
	  marker.setMap(map);
	  var infowindow = new google.maps.InfoWindow({
	    content: '{{$address}}'
	  });
	  infowindow.open(map,marker);
	  // zoom when clickking on marker 
	  google.maps.event.addListener(marker, 'click', function(){
	    map.setZoom(20);
	    map.setCenter(marker.getPosition());
	  });
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	</body>
</html>