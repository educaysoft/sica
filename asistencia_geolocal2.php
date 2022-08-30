<!DOCTYPE html>
<html>
<head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body >

<p>Click the button to get your coordinates.</p>


<p id="demo"></p>

<script>

var x = document.getElementById("demo");
$(document).ready(function(){

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
});

function showPosition(position) {  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>

</body>
</html>















