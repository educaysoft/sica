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
	<div id="eys-login" class="w3-container" style="height:1500px;" >
<div id="eys-login2"  class="w3-card-4"  >
	<header class="w3-container" style="background-color:#4CAF50;">
					<p style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:25px; color:white; text-align:center;">Educación Continua </p>
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
                 <label class="form-label" for="email">Usuario(correo):</label>
              <!---    <input type="email" class="form-control" name="email" id="email"  aria-describedby="sizing-addon1">  --->
                 <input type="text" class="form-control" name="email" id="email"  aria-describedby="sizing-addon1">  

</div>

 <div >
		  <label for="password">Contraseña:</label>
                  <input type="password" class="form-control"  name="password" id="password" />
</div >

 <div >

		<input type="checkbox" onclick="showpassword()"> &ensp; Mostrar contraseña 

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

<!--- <center><p>¿Usted aun no tiene un cuenta? <br> <a style="color:red;" href="<?php echo base_url() ?>index.php/login/user_registration_show" role="button">Creela ahora</a></p></center> -->
	</footer>

   <?php echo form_close(); ?>
</div>
</div>
</div>

<script>

function showpassword(){
	var x=document.getElementById("password");
	if(x.type=="password" ){
		x.type="text";
	}else{
		x.type="password";
	}

}




 async function get_evento() {	
	
	var correo = $('select[name=correo]').val();
	var password = $('select[name=password]').val();
    $.ajax({
        url: "<?php echo site_url('password/get_evento'); ?>",
        data: {correo:correo, password:password},
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



</script>
