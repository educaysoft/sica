<?php
if (isset($logout_message)) {
	echo "<div class='message'>";
	echo $logout_message;
	echo "</div>";
}
?>
<?php
if (isset($message_display)) {
	echo "<div class='message'>";
	echo $message_display;
	echo "</div>";
}
?>
	<div id="eys-login" class="w3-container" >
<div id="eys-login2"  class="w3-card-4"  >
<header id="eys_header"  class="w3-container" >
               <p>SISTEMA UTLVTE</p>
            <?php echo form_open('login/user_login_process'); ?>
             <?php
                echo "<div class='error_msg'>";
                 if (isset($error_message)) {
                   echo $error_message;
                 }
                echo validation_errors();
                 echo "</div>";
                  ?>
</header>
<main class="w3-container" style=" font-size:50%; padding:30px;">
 <div >
                 <label class="form-label" for="email">Usuario:</label>
              <!---    <input type="email" class="form-control" name="email" id="email"  aria-describedby="sizing-addon1">  --->
                 <input type="text" class="form-control" name="email" id="email"  aria-describedby="sizing-addon1">  

</div>

 <div >
		  <label for="password">Contraseña:</label>
                  <input type="password" class="form-control"  name="password" id="password" />
</div>
<div class="w3-container" style="padding-top:5px;">
<?php
  		$data=array('type'=>'submit','value'=>'Ingresar','name'=>'submit','style'=>'background-color: #4CAF50; border: 0; border-radius: 10px; cursor: pointer; color: #fff; font-size:16px; font-weight: bold;line-height: 1.4; padding: 10px;   width: 100%;');
  		echo	form_submit($data);
  		echo form_close();
  	?>
		</div>
	</main>
	<footer class="w3-container" style="font-size:25px; padding: 10px;">
<!--        
 	<p>Para imprimir tu certificado ingresa con:</p>
 	<p>Usuario: admin</p>
 	<p>Contraseña: admin</p>
-->
<!--- <center><p>¿Usted aun no tiene un cuenta? <br> <a style="color:red;" href="<?php echo base_url() ?>index.php/login/user_registration_show" role="button">Creela ahora</a></p></center> -->
	</footer>

   <?php echo form_close(); ?>
</div>
</div>
