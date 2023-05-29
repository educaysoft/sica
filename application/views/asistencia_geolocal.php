
<?php echo  $title; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<a href='<?php echo $retornar; ?>'>Otro registro</a>

<span id="msn"> </span>

<script>


var email=<?php echo  $paracorreo['nombre']; ?>;
var mensaje=<?php echo  $paracorreo['mensaje']; ?>;
 alert(email);
 alert(mensaje);


	enviar_correo(email,mensaje);
//var x = document.getElementById("demo");
$(document).ready(function(){

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







	function enviar_correo(email,mansaje){

	var y = document.getElementById("msn");
		 var idevento=<?php echo $idevento ?>;
		 var titulo=mensaje;  document.getElementById("titulo").value; //   "stalin.francis@utelvt.edu.ec";
		 var email="educacioncontinua@utelvt.edu.ec";
		 var nome= 'Stalin Francis Q.'; // document.getElementById("lapersona_edit").value; 		
                 var msg="Ingresa al siguiente link para terminar tu registro y poder recibir tu certificado al culminar el evento <br><br><a href='https://educaysoft.org/sica/index.php/login/registro?idevento="+idevento+"' style='text-align:center;'><b>Evento :</b>"+titulo+"</a><br><br>";  //tinyMCE.activeEditor.getContent({format:'text'});
		 var mailto=email; document.getElementById("email").value; //   "stalin.francis@utelvt.edu.ec";
		 var secure="siteform";
		 var head="";
			
		var foot0="<br><div style='text-align:center; background-color:lightgrey;'> Aprovechamos la oportunidad para informarte que la Universidad Técnica Luis Vargas Torres esta ejecutando los siguientes programas de capacitación para el perfeccionamiento de nuestros docentes.<br><br> <a href='https://educaysoft.org/sica/curso/CursosEducacionContinua2023'>Cursos de Educación Continua</a><br><br></div>" ;
		 var foot=" <div style='text-align:center; background-color:lightgrey; font-size:12px;'> Este correo ha sido enviado a "+mailto+ ", de acuerdo a la Ley Orgánica de Protección de datos, usted tiene el derecho a solicitar a la Universidad Técnica Luis Vargas Torres, la actualización, inclusión, supresión y/o tratamiento de los datos personales incluidos en sus bases de datos, con este correo electrónico usted acepta recibir información de las actividades académicas que realiza el Alma Mater así como nuestra propuestas académicas <br><br> Este correo fue generado y enviado automáticamente desde el sistema cloud elaborado de la Maestría en Tecnología de la Información</div> ";

		msg=head+msg+foot0+foot;

	    $.ajax({
		url: "<?php echo site_url('seguimiento/send') ?>",
		data: {nome:nome, email:email, msg:msg, mailto:mailto, secure:secure},
		method: 'POST',
		async : false,
		success: function(data){
		var html = '';
		const div = document.getElementById('panel2');
	//	get_participantes2();
		div.innerHTML ='<span style="font-size:20px; ">Un mensaje a sido enviado al correo<br><br>'+mailto+'<br><br> Revisa la bandeja de entrada y da click en el enlace para continuar con el registro</span>';
		alert(data);

    y.innerHTML = "Se envio un mensaje.";
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })



       }






</script>


<?php

//die();
?>















