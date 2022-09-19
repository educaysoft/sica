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
    navigator.geolocation.getCurrentPosition(function (position)
    {
	  
        var latitud = 1111; //position.coords.latitude;
        var longitud = 3939; //position.coords.longitude;
	var idasistencia=3212; // $idasistencia;

        $.ajax({
	 url: "<?php echo site_url('login/save_geolocalizacion') ?>",
        data: {idasistencia:idasistencia,longitud:longitud,latitud:latitud},
        method: 'GET',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
	})



});



    x.innerHTML = "Sise pudo.";


  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
});


</script>




</body>
</html>















