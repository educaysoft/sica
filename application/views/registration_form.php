<?php
/*
 * Archivo registration_form.php
 * Author: Ing. Stalin Francis Quinde.
 * Institución: Universidad Técnica Luis Vargas Torres de Esmeraldas
 * Objetivo: Registro de usuario
 */

?>
<section id="presentacion">
    
<div class="w3-container" id="eys-registro">
	
	<div style="width: 50%;  padding:5px;   display: inline-flex; " >
		<div   style="width:100%; height:800px; ">
			<header class="w3-container">
			<div ><center> <img src="<?php echo base_url(); ?>images/CentroEducacionContinua.png" style="width: 100%;" alt="Centro de Educación Continua UTLVTE"></img></center>   </div>
			<p id="titulo" style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:30px; text-align:center;">Sistema de registro para eventos académicos <br>  UTELVT</p>
			</header>
			<div id="detalle" class="w3-container" style="display:flex; flex-direction:column; padding: 30px; font-size:70%;">
<center> <img src="<?php echo base_url(); ?>images/eventos/eventosacademicos.png" id="imagenevento" style="width: 100%;" alt="Imagen del evento"></img></center>
			<p>Para poder unirte a este evento sigue las  instrucciones: </p><br>
			<ol>
			<li> Verifica si el evento esta en etapa de Inscripción.  </li>
			<li> Ingresa tus datos de contacto  que se solicita.  </li>
			<li> No te olvides de registrar un correo electrónico válido.  </li>
			<li> No te olvides registrar una contraseña que puedas recordar.  </li>
			<li> Finalmente guarda los datos y estas listo para ingresar a nuestra plaforma.  </li>
			</ol>
			</div>
		 </div>
		</div>



		<div style="width: 40%;  padding:5px;   display: inline-flex; " >
			<div class="w3-card-2"  style="width:100%; height:1000px; ">
				<header class="w3-container" style="background-color:#4CAF50;">
					<p style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:25px; color:white;
               							 text-align:center;">Registrate Aquí </p>
				</header>
				<div class="w3-container" style="display:flex; flex-direction:column; padding: 30px; font-size:70%;">
					<?php


						echo form_open('login/new_user_registration');
					?>

					


<!-----

	<div  class="w3-container" style="text-align:left; font-size: 70%;">

	<label  style='text-align:left; font-size: 100%;' for='evento'> Evento: </label>

    <div class="form-group">
         <select class="form-control" id="idevento" name="idevento" required onchange='show_detalle()'>
                 <option>No Selected</option>
          </select>
    </div>
					</div>

---->

<!----
					<div  class="w3-container" style="text-align:left; font-size: 70%;">

						<?php 
						echo "<label  style='text-align:left; font-size: 100%;' for='evento'> Evento: </label>";
							$options= array('--Select--');
							foreach ($eventos as $row){
								$options[$row->idevento]= $row->titulo;
							}

				echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('class'=>'form-control'));  
?>
					</div>

-->

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
		echo "<label  style='text-align:left; font-size: 100%;' for='evento'>  <estado style='font-size:20px; color:green;'> INSCRIPCIONES ABIERTAS</estado> </label>";
	}else{

			echo "<label  style='text-align:left; font-size: 100%;' for='evento'> <estado style='font-size:20px; color:red;'>INSCRIPCIONES CERRADAS</estado> </label>";
	}

    $arrdatos=array('name'=>'idevento','value'=>$eventos[0]->idevento,"type"=>"hidden", "style"=>"width:600px");
				echo form_input($arrdatos) ;

	$textarea_options = array('class' => 'form-control','rows' => '3',   'cols' => '8',"disabled"=>"disabled", 'style'=>"height:100px !important;");    
							echo form_textarea('titulo',$eventos[0]->titulo,$textarea_options);
}
?>





					</div>








	<div  class="w3-container" style="text-align:left; font-size: 70%;">
	<?php
	echo "<label  style='text-align:left; font-size: 100%;' for='cedula'> Cédula: </label>";

	if($eventos[0]->idevento_estado==2)
	echo form_input(array('id'=>'cedula','name'=>'cedula','maxlength'=>'10',  'class'=>'form-control'));
	else
	echo form_input(array('id'=>'cedula','name'=>'cedula','maxlength'=>'10', 'disabled'=>'disabled', 'class'=>'form-control'));

	echo "<div class='error_msg'>";
	if (isset($message_display)) {
		echo $message_display;
	}
		echo "</div>";
		?>
	</div>


					<div class="w3-container" style="text-align:left; font-size: 70%;">
						<?php
						echo "<label style='text-align:left; font-size: 100%;'  for='apellidos'> Apellidos: </label>";
						if($eventos[0]->idevento_estado==2)
						echo form_input(array('id'=>'apellidos', 'name'=>'apellidos' , 'class'=>'form-control'));
						else
						echo form_input(array('id'=>'apellidos', 'name'=>'apellidos' ,'disabled'=>'disabled', 'class'=>'form-control'));

						echo "<div class='error_msg'>";
						if (isset($message_display)) {
							echo $message_display;
						}
						echo "</div>";
						?>
					</div>


					<div class="w3-container"  style="text-align:left; font-size: 70%;">
						<?php
						echo "<label  style='text-align:left; font-size:100%;' for='nombres' >  Nombres: </label>";
						if($eventos[0]->idevento_estado==2)
						echo form_input(array('id'=>'nombres','name'=>'nombres', 'class'=>'form-control'));
						else
						echo form_input(array('id'=>'nombres','name'=>'nombres','disabled'=>'disabled', 'class'=>'form-control'));

						echo "<div class='error_msg'>";
						if (isset($message_display)) {
							echo $message_display;
						}
						echo "</div>";
						?>
					</div>




					<div class="w3-container"  style="text-align:left; font-size: 70%;" >
					<?php
						echo "<label style='text-align:left; font-size: 100%;'  for='email'> Correo: </label>";
						$data = array('id'=>'email', 'type' => 'email','name' => 'email','class'=>'form-control');
						echo form_input($data);
					?>
					</div>

					<div  class="w3-container" style="text-align:left; font-size: 70%;">

						<?php 

						echo "<label  style='text-align:left; font-size: 100%;' for='sexo'> Sexo: </label>";
							$options= array('--Select--');
							foreach ($sexos as $row){
								$options[$row->idsexo]= $row->nombre;
							}

						 echo form_dropdown($name="idsexo",$options, set_select('--Select--','default_value'),array('class'=>'form-control','id'=>'idsexo'));  ?>

					</div>


					<div class="w3-container"  style="text-align:left; font-size: 70%;" >
					<?php
						echo "<label style='text-align:left; font-size: 100%;'  for='email'> Fecha de nacimiento: </label>";
						$data = array('id'=>'fechanacimiento', 'type' => 'date','name' => 'fechanacimiento','class'=>'form-control');
						echo form_input($data);
					?>
					</div>



					<div class="w3-container"  style="text-align:left; font-size: 70%;" >
					<?php
						echo "<label style='text-align:left; font-size: 100%;'  for='email'> Teléfono: </label>";
						$data = array('id'=>'telefono', 'type' => 'text','name' => 'telefono','class'=>'form-control');
						echo form_input($data);
					?>
					</div>


<div  class="w3-container" style="text-align:left; font-size: 70%;">

						<?php 

						echo "<label  style='text-align:left; font-size: 100%;' for='sexo'> Pais: </label>";
							$options= array('--Select--');
							foreach ($paises as $row){
								$options[$row->idpais]= $row->nombre;
							}

						 echo form_dropdown($name="idpaispersona",$options, set_select('--Select--','default_value'),array('class'=>'form-control','id'=>'idpaispersona'));  ?>

					</div>






					<div class="w3-container"  style="text-align:left; font-size: 70%;" >
					<?php
						echo "<label  style='text-align:left; font-size: 100%;'    for='password' > Contraseña: </label>";
						echo form_password(array('id'=>'password','type'=>'password','name'=>'password', 'class'=>'form-control'));
					?>
					</div>

					<div class="w3-container"   style="text-align:left; font-size: 70%;"  >
						<?php
						echo "<label  style='text-align:left; font-size: 100%; padding:0;'    for='password2' > Repita contraseña: </label>";
						echo form_password(array('id'=>'password2','type'=>'password','name'=>'password', 'class'=>'form-control','style'=>'border-color:green;'));
						?>
					</div>
					
					<div class="w3-container"  style="text-align:left; font-size: 70%;" >
						<input type="checkbox" onclick="showpassword()"> &ensp; Mostrar contraseña 

					</div>
					<div class="w3-container" style="padding-top:10px;">
					<?php
					if($eventos[0]->idevento_estado==2)
					{

					 	$data=array('type'=>'submit','value'=>'Guardar datos','name'=>'submit','style'=>'background-color: #4CAF50;
						border: 0;
						border-radius: 10px;
						cursor: pointer;
						color: #fff;
						font-size:16px;
						font-weight: bold;
						line-height: 1.4;
						padding: 10px;
						width: 100%;');
						echo form_submit($data);
						echo form_close();
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
						echo form_submit($data);
						echo form_close();
					}
					?>
	

					</div>
				</div>

				<footer align="right"  class='w3-container' style="font-size:25px; padding-top:0px; padding: 5px;">
					<center> ¿Ya creastes tu cuenta? <br> <a style="color:red;"  href="<?php echo base_url() ?>index.php/login" role="button">Ingresar al sistema</a></center>
				</footer>
			</div>
		</div>
</div>
</section>

<script>

$(document).ready(()=>{
var inputField = document.querySelector('#cedula');

inputField.onkeydown = function(event) {
  // Only allow if the e.key value is a number or if it's 'Backspace'
  if(isNaN(event.key) && event.key !== 'Backspace') {
    event.preventDefault();
  }
};



  });     

						
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




