
<!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>


<script>
$(document).ready(function() {
	alert("entro");
if (navigator.geolocation)
{
    //Get the current position
    navigator.geolocation.getCurrentPosition(function (position)
    {
        var latitud = position.coords.latitude;
        var longitud = position.coords.longitude;
	var idasistencia=2464; // $idasistencia;
	alert(latitud);
      /*  $.ajax(
        {
	 url: "<?php echo site_url('login/save_geolocalizacion') ?>",
        data: {idasistencia:idasistencia,longitud:logintud,latitud:latitud},
        method: 'POST',
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
	})*/
    });
	
	}
else
{
 alert("Sorry... your browser does not support the HTML5 GeoLocation API");
}
});

</script>
</body>
</html>
