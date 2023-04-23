<?php
/*
 * Archivo registration_form.php
 * Author: Ing. Stalin Francis Quinde.
 * Institución: Universidad Técnica Luis Vargas Torres de Esmeraldas
 * Objetivo: Registro de usuario
 */

?>
<section id="presentacion">
    
<div class="w3-container" id="eys-registro" style="width: 100%;"  >
	
	<div style="width: 50%;  padding:5px;   display: inline-flex; " >
		<div   style="width:100%; height:800px; ">
			<header class="w3-container">
			<div style="text-align:center"> <img src="<?php echo base_url(); ?>images/LogoEducacionContinua.png" style="width: 30%;" alt="Centro de Educación Continua UTLVTE">  </div>
			<p id="titulo1" style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:30px; text-align:center;">Sistema de registro para eventos académicos <br>  UTELVT</p>
			</header>
			<div id="detalle" class="w3-container" style="display:flex; flex-direction:column; padding: 30px; font-size:70%;margin:auto;	">
    <?php
    $x='https://repositorioutlvte.org/Repositorio/eventos/'. $eventos[0]->idevento.'.png';
if(@getimagesize($x)){ ?>
<img src="<?php echo $x; ?>"  id="imagenevento" style="width: 100%;" alt="Imagen del evento"></img>
   <?php }else{ ?>

 <img src="https://repositorioutlvte.org/Repositorio/eventos/sinimagen.png"  id="imagenevento" style="width: 100%;" alt="Imagen del evento">
<?php } ?>

			<p>Para poder unirte a este evento sigue las  instrucciones: </p><br>
			<ol>
			<li> Verifica si el evento esta en etapa de Inscripción.  </li>
			<li> Ingresa tus datos personales y de contacto solicitados.  </li>
			<li> Finalmente guarda los datos y estas listo para ingresar a nuestra plaforma.  </li>
			</ol>
			</div>
		 </div>
		</div>

		<div style="width: 45%;  padding:5px;   display: inline-flex; height:1500px;" >
			<div class="w3-card-2"  style="width:100%; height:1200px; ">
				<header class="w3-container" style="background-color:#4CAF50;">
					<p style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:25px; color:white; text-align:center;">Registrate Aquí </p>
				</header>
				<div class="w3-container" style="display:flex; flex-direction:column; padding: 30px; font-size:70%;">
					<?php


						//echo form_open('login/new_user_registration');
						echo form_open("",array("id"=>"validarcorreo0"));

					?>

					


<div  class="w3-container" style="text-align:left; font-size: 70%;">

						<?php 
if(sizeof($eventos)>1){

						echo "<label  style='text-align:left; font-size: 100%;' for='evento'> Evento: </label>";
							$options= array('--Select--');
							foreach ($eventos as $row){
								$options[$row->idevento]= $row->titulo;
							}

						 echo form_dropdown($name="idevento",$options, set_select('--Select--','default_value'),array('class'=>'form-control','id'=>'idevento','onchange'=>'show_detalle()'));  


}else{
	if($eventos[0]->idevento_estado==2)
	{
		echo "<label  style='text-align:left; font-size: 20px; color:green;' for='titulo'>   INSCRIPCIONES ABIERTAS </label>";
	}else{

		echo "<label  style='text-align:left; font-size: 20px; color:red;' for='titulo'> INSCRIPCIONES CERRADAS </label>";
	}

    $arrdatos=array('name'=>'idevento','value'=>$eventos[0]->idevento,"type"=>"hidden", "style"=>"width:600px");
				echo form_input($arrdatos) ;

	$textarea_options = array('class' => 'form-control',"disabled"=>"disabled", 'style'=>"height:100px !important;",'id'=>'titulo');    
							echo form_textarea('titulo',$eventos[0]->titulo,$textarea_options);
}
?>





					</div>








	


					


					




					<div class="w3-container"  style="text-align:left; font-size: 70%;" >
					<?php
						echo "<label style='text-align:left; font-size: 100%;'  for='email'> Correo: </label>";
						$data = array('id'=>'email', 'type' => 'email','name' => 'email','class'=>'form-control');
						echo form_input($data);
					?>
					</div>

					


					



					









					

					
					
					
					<div class="w3-container" style="padding-top:10px;">
					<?php
					if($eventos[0]->idevento_estado==2)
					{

					 	$data=array('type'=>'submit','value'=>'Guardar datos','name'=>'submit','id'=>'validarcorreo','style'=>'background-color: #4CAF50;
						border: 0;
						border-radius: 10px;
						cursor: pointer;
						color: #fff;
						font-size:16px;
						font-weight: bold;
						line-height: 1.4;
						padding: 10px;
						width: 100%;');
					}else{
					 	$data=array('type'=>'submit','value'=>'Guardar datos','name'=>'submit','disabled'=>'disabled','style'=>'background-color: #4CAF50;
						border: 0;
						border-radius: 10px;
						cursor: pointer;
						color: #fff;
						font-size:16px;
						font-weight: bold;
						line-height: 1.4;
						padding: 10px;
						width: 100%;');
					}
					?>
					</div>
					<?php                          
						echo form_submit($data);
						echo form_close();
					?>

<footer   class='w3-container' style="font-size:25px; padding-top:0px; padding: 0px; text-align:center; ">
					 ¿Ya creastes tu cuenta? <br> <a style="color:red;"  href="<?php echo base_url() ?>index.php/login" role="button">Ingresar al sistema</a>
				</footer>
				</div>

				
			</div>
		</div>
</div>
</section>

<script>
$(document).ready(function(){

$('#validarcorreo').click(function() {
	alert("llego");
	enviar_correo();
	return false;
});




  });     

	function enviar_correo(){
		 var email="educacioncontinua@utelvt.edu.ec";
		 var nome= 'Stalin Francis Q.'; // document.getElementById("lapersona_edit").value; 		
                 var msg="Ingrea al siguiente link para terminar su registro ";  //tinyMCE.activeEditor.getContent({format:'text'});
		 var mailto=document.getElementById("email").value; //   "stalin.francis@utelvt.edu.ec";
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
		var i;
	//	get_participantes2();
		alert(data);
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })



       }






						
						function validacedula()
						{


var inputField = document.querySelector('#cedula');
alert(inputField.value);
						}						
						
function showpassword(){
	var x=document.getElementById("password");
	var y=document.getElementById("password2");
	if(x.type=="password" ){
		x.type="text";
		y.type="text";
	}else{
		x.type="password";
		y.type="password";
	}

}







 async function get_evento() {	
	
	var idinstitucion = $('select[name=idinstitucion]').val();
    $.ajax({
        url: "<?php echo site_url('evento/get_evento'); ?>",
        data: {idinstitucion: idinstitucion},
        method: 'POST',
	 async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        html += '<option value='+'0'+'>'+'Nada seleccionado'+'</option>';
        var i;
        for(i=0; i<data.length; i++){
		html += '<option value='+data[i].idevento+'>'+data[i].titulo+'</option>';
        }
        $('#idevento').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}


function show_detalle()
{
  $('#detalle').html("HOLA MUNDO");

	var idevento = $('select[name=idevento]').val();
    $.ajax({
        url: "<?php echo site_url('evento/get_evento2') ?>",
        data: {idevento: idevento},
        method: 'POST',
	async : false,
        dataType : 'json',
        success: function(data){
        var html1 = '';
        var html2 = '';
        var i;
        for(i=0; i<data.length; i++){
        html1 += data[i].titulo;
        html2 += data[i].detalle;
        }
        $('#titulo').html(html1);
        $('#detalle').html(html2);

        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })


}





</script>




