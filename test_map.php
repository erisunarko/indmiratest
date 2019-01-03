<html>
	<head></head>
	
	<body>

	<h1>My First Google Map</h1>

	<div id="googleMap" style="width:100%;height:400px;"></div>

	<script>
	function myMap() {
	var mapProp= {
	  center:new google.maps.LatLng(51.508742,-0.120850),
	  zoom:5,
	};
	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCk6GPBUGub8-zC9XrGqhy1_-I_BD_3js&callback=myMap"
  type="text/javascript"></script>

	</body>
</html>