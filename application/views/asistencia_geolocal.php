<?php
//$title = "Título del documento";
//$retornar = "URL de retorno";
//$elcorreo = "correo@example.com";
//$elmensaje = "Este es un mensaje";
//$idevento = "ID del evento";
?>

<p><?php echo $title; ?></p>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<br>
<a href='<?php echo $retornar; ?>'>Otro registro</a>

<span id="msn">iss </span>
<div id="panel2">iss </div>

<?php
// Mostrar los datos PHP en JavaScript usando json_encode
echo "<script>";
echo "var elcorreo = " . json_encode($elcorreo) . ";";
echo "var elmensaje = " . json_encode($elmensaje) . ";";
echo "var idevento = " . json_encode($idevento) . ";";
echo "</script>";
?>

<script>
$(document).ready(function(){
    // Llama a la función enviar_correo con los datos
    enviar_correo(idevento, elmensaje, elcorreo);

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitud = position.coords.latitude;
            var longitud = position.coords.longitude;
            var idasistencia = <?php echo $idasistencia ?>;
            $.ajax({
                url: "<?php echo site_url('login/save_geolocalizacion') ?>",
                data: {"idasistencia": idasistencia, "longitud": longitud, "latitud": latitud},
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    var html = '';
                    var i;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
});

function enviar_correo(xidevento, xtitulo, xmailto){
    var idevento = xidevento;
    var titulo = xtitulo;
    var email = "stalin.francis@utelvt.edu.ec";
    var correode = "stalin.francis@utelvt.edu.ec";
    var nome = 'Stalin Francis Q.';
    var msg = "Tu registro a sido realizado con exito ingresa al siguiente link revisar las opciones y poder comenar a trabajar <br><br><a href='https://educaysoft.org/sica/index.php/login' style='text-align:center;'><b>Evento :</b>" + titulo + "</a><br><br>";
    var mailto = xmailto;
    var correopara = mailto;
    var secure = "siteform";
    var head = "";
    var foot0 = "<br><div style='text-align:center; background-color:lightgrey;'> Aprovechamos la oportunidad para informarte que la Universidad Técnica Luis Vargas Torres esta ejecutando los siguientes programas de capacitación para el perfeccionamiento de nuestros docentes.<br><br> <a href='https://educaysoft.org/sica/curso/CursosEducacionContinua2023'>Cursos de Educación Continua</a><br><br></div>";
    var foot = " <div style='text-align:center; background-color:lightgrey; font-size:12px;'> Este correo ha sido enviado a " + mailto + ", de acuerdo a la Ley Orgánica de Protección de datos, usted tiene el derecho a solicitar a la Universidad Técnica Luis Vargas Torres, la actualización, inclusión, supresión y/o tratamiento de los datos personales incluidos en sus bases de datos, con este correo electrónico usted acepta recibir información de las actividades académicas que realiza el Alma Mater así como nuestra propuestas académicas <br><br> Este correo fue generado y enviado automáticamente desde el sistema cloud elaborado de la Maestría en Tecnología de la Información</div> ";
    msg = head + msg + foot0 + foot;

    $.ajax({
        url: "<?php echo site_url('seguimiento/send') ?>",
        data: {nome: nome,correode:correode,correopara:correopara, email: email, msg: msg, mailto: mailto, secure: secure},
        method: 'POST',
        success: function(data){
            const div = document.getElementById('panel2');
            div.innerHTML = `
                <div style="font-size:18px; color:#333; text-align:center;">
                    <h2>Registro realizado con éxito</h2>
                    <p>Se ha enviado un mensaje al correo:</p>
                    <p style="font-weight:bold; color:#0056b3;">${mailto}</p>
                    <p>Por favor, revisa tu bandeja de entrada para ingresar al sistema.</p>
                    <p>Si no ves el correo en tu bandeja de entrada, revisa también la carpeta de spam.</p>
                </div>
            `;
 

        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
</script>
