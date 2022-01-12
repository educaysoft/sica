<?php
if ( ! isset($this->session->userdata['logged_in'])){
  header("location: http://localhost/SICAPG/index.php/mti");
}
?>


	<div class="w3-container" style="margin-top:2.5cm; width:100%; padding:10px; display:inline-block; vertical-align:top; margia:auto;">
<div id="p1" class="eys-contenido-blog">
   		 <div class="w3-card-2" style="height:100%;">
			<header class="w3-red" style='padding:10px; display:inline-block; width: 100%;'>
	
<form action="upfoto/loadfoto" method="post" enctype="multipart/form-data">
<div style="float:left; width: 35%; font-size:1.5vw;">  Seleccione la foto a subir :</div>
 <div style="float:left; width:30%; "> <input class="w3-button w3-blue" style="font-size: 1vw;" type="file" name="fileToUpload" id="fileToUpload"></div><div style="float:right;">  <input class="w3-button" type="submit" value="Guardar foto" name="submit"></div>
</form>

			</header>
			<div>
				<center>
				<?php if(trim($this->session->userdata['logged_in']['foto'])==""){ ?> 
				<a  href="#"><img style="border-radius:50%;" src="<?php echo base_url(); ?>fotos/perfil.jpg" width="400" height="300" alt=""> </a>
				<?php }else{ ?>
				<img style="border-radius:50%;" src="<?php echo base_url().$this->session->userdata['logged_in']['foto']; ?>" width="400" height="300" alt=""> 
<?php } ?>

				</center>
			</div> 
<footer class="w3-container w3-blue"  style="dispay:inline-block; width=100%; left:0px; bottom:0px;">

</footer>
		</div>
</div>
</div>

<script type='text/javascript'>
function fpostulacion(){
	document.getElementById("p1").innerHTML = "<div class='w3-card-2' style='height:100%; position:relative;'><header class='w3-containar w3-blue' style='padding:10px'><p>¿En que consiste la postulación</p></header> <div class='w3-container' style='padding:10; font-size:20px;'><p> La postulación es el proceso en el cual el aspirante a magister debe compobar con documentos, una evaluación y una entrevista si esta habilitado para ingredar al programa de maestría que ofrece la Universidad Técnica Luis Vargas Torres de Esmeraldas.</p> <p> Si sientes que esta prepara, comienza  <a href='Portafolio/postulacion'> <button class='w3-button w3-black'>Aquí</button></a></p> </div> <footer class='w3-container w3-green' style='position:absolute; bottom:0; left:0; width:100%; padding:10px;'> <a href='Portafolio/postulacion'> Comienza a postular </a> </footer></div>";

}

</script>
