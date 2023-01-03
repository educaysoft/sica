<!DOCTYPE html>
<html>
  <head>
    Google map api with marker
  </head>
  <body>
    <div id="map_container" style="width: 50%; height: 350px;"> </div>
    <script>
      function initialize_map() {
        var mapDiv = document.getElementById('map_container');
        var map = new google.maps.Map(mapDiv, {
            center: {lat: 28.7041, lng: 77.1025},
			zoom: 10
        });
        var marker = new google.maps.Marker({
	     position: new google.maps.LatLng(28.6315, 77.2167),
	     map: map
	 });
	 var address = '<div><p><b>Organization  Address</b></p></div>';
	 var infowindow = new google.maps.InfoWindow({
             content: address
         });
         marker.addListener('click', function() {
          infowindow.open(map, marker);
         });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initialize_map">
    </script>
  </body>
</html
