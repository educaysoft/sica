
<?php echo  $title; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<br>
<a href='<?php echo $retornar; ?>'>Otro registro</a>

<span id="msn">iss </span>
<span id="panel2">iss </span>

<span id="email">"<?php echo  $elcorreo; ?>"</span>
<span id="mensaje">"<?php echo  $elmensaje; ?>"</span>



<script>


//var x = document.getElementById("demo");
$(document).ready(function(){

alert('llago'); 
//var email=<?php echo  $elcorreo; ?>;
//var mensaje=<?php echo  $elmensaje; ?>;
// alert(email);
// alert(mensaje);

//	enviar_correo(email,mensaje);




  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position)
    {
	 
        var latitud = position.coords.latitude;
        var longitud =position.coords.longitude;
//	var idasistencia=document.getElementById('demo').value;
 var idasistencia = <?php echo  $idasistencia ?>;
//	alert(idasistencia);
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















