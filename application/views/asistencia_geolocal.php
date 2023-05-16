
<?php echo  $title; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<p>Click the button to get your coordinates.</p>
<a href='<?php echo $retornar; ?>'>Otro registro</a>

<script>

var x = document.getElementById("demo");
$(document).ready(function(){

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position)
    {
	 
        var latitud = position.coords.latitude;
        var longitud =position.coords.longitude;
//	var idasistencia=document.getElementById('demo').value;
 var idasistencia = <?php echo  $idasistencia ?>;
	alert(idasistencia);
        $.ajax({
	 url: "<?php echo site_url('login/save_geolocalizacion') ?>",
        data: {"idasistencia":idasistencia,"longitud":longitud,"latitud":latitud},
        method: 'GET',
	async : false,
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


<?php

//die();
?>















