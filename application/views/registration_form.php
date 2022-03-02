<section id="presentacion">
    
<div class="w3-container" id="eys-registro">
	
		<div style="width: 50%;  padding:5px;   display: inline-flex; " >
			<div   style="width:100%; height:700px; ">
				<header class="w3-container">
					<p style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:30px; text-align:center;">Maestría en Tecnología de la Información</p>
				</header>
				<div class="w3-container" style="display:flex; flex-direction:column; padding: 30px; font-size:70%;">

					<p>La Universidad Técnica Luis Vargas Torres desde más de 10 años forma profesionales de grado en disciplinas relacionadas con la tecnología de la información.</p><br>
					<p>La aprobación de la <b>Maestría en Tecnología de la Información</b> permite mejora el perfil de nuestros ingenieros para que sean capaces de  liderar procesos de cambio en instituciones locales y nacionales.</p><br>
					<p>Si estas interesado en ingresar a este prometedor programa de maestría comienza con lo siguiente: </p><br>
					<ol>
					<li> Informate más de esta maestría <a href="<?php echo base_url(); ?>MTI/doc/_build/html/programa.html"><button class="button-33" role="button">Aquí</button></a></li>
					<li> Registra tus datos de contacto en el formulario </li>
					</ol>
				</div>
			 </div>
		</div>



		<div style="width: 40%;  padding:5px;   display: inline-flex; " >
			<div class="w3-card-2"  style="width:100%; height:850px; ">
				<header class="w3-container" style="background-color:#4CAF50;">
					<p style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:25px; color:white;
               							 text-align:center;">Registrate Aquí </p>
				</header>
				<div class="w3-container" style="display:flex; flex-direction:column; padding: 30px; font-size:70%;">
					<?php
						echo form_open('login/new_user_registration');
					?>

					<div  class="w3-container" style="text-align:left; font-size: 70%;">

						<?php 

						echo "<label  style='text-align:left; font-size: 100%;' for='institucion'> Institución: </label>";
							$options= array('--Select--');
							foreach ($instituciones as $row){
								$options[$row->idinstitucion]= $row->nombre;
							}

						 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'),array('class'=>'form-control'));  ?>

					</div>


					<div  class="w3-container" style="text-align:left; font-size: 70%;">

						<?php 

						echo "<label  style='text-align:left; font-size: 100%;' for='evento'> Evento: </label>";
							$options= array('--Select--');
							foreach ($eventos as $row){
								$options[$row->idevento]= $row->titulo;
							}

						 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('class'=>'form-control'));  ?>

					</div>



					<div  class="w3-container" style="text-align:left; font-size: 70%;">
						<?php
						echo "<label  style='text-align:left; font-size: 100%;' for='cedula'> Cédula: </label>";
						echo form_input(array('id'=>'cedula','name'=>'cedula', 'class'=>'form-control'));
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
						echo form_input(array('id'=>'apellidos', 'name'=>'apellidos' , 'class'=>'form-control'));
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
						echo form_input(array('id'=>'nombres','name'=>'nombres', 'class'=>'form-control'));
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

					<div class="w3-container"  style="text-align:left; font-size: 70%;" >
					<?php
						echo "<label style='text-align:left; font-size: 100%;'  for='email'> Teléfono: </label>";
						$data = array('id'=>'telefono', 'type' => 'text','name' => 'telefono','class'=>'form-control');
						echo form_input($data);
					?>
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

					<div class="w3-container" style="padding-top:10px;">
					<?php 	$data=array('type'=>'submit','value'=>'Guardar datos','name'=>'submit','style'=>'background-color: #4CAF50;
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
						echo form_close();?>
					</div>
				</div>

				<footer align="right"  class='w3-container' style="font-size:25px; padding: 10px;">
					<center> ¿Ya creastes tu cuenta? <br> <a style="color:red;"  href="<?php echo base_url() ?>index.php/login" role="button">Ingresar al sistema</a></center>
				</footer>
			</div>
		</div>
</div>
</section>



