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
 <!--<div style="float:left; width:30%; "> <input class="w3-button w3-blue" style="font-size: 1vw;" type="file" name="fileToUpload" id="fileToUpload"></div><div style="float:right;">  <input class="w3-button" type="submit" value="Guardar foto" name="submit"></div>  -->


 <div style="float:left; width:30%; "> <input class="w3-button w3-blue" style="font-size: 1vw;" type="file" name="fileToUpload" id="fileToUpload"></div><div style="float:right;">


			<?php 
			$cedula=$this->session->userdata['logged_in']['cedula'];
			$js='onClick="uploadImage(\''.$cedula.'.jpg\')"';     
			echo form_button("carga","cargar a directorio",$js); ?>

  <p id="status"></p> 
</div>


</form>

			</header>
			<div>
				<center>
				<?php if(trim($this->session->userdata['logged_in']['foto'])==""){ ?> 
				<a  href="#"><img style="border-radius:50%;" src="<?php echo base_url(); ?>fotos/perfil.jpg" width="400" height="300" alt=""> </a>
				<?php }else{ ?>
				<img style="border-radius:50%;" src="<?php echo "https://repositorioutlvte.org/Repositorio/".$this->session->userdata['logged_in']['foto']; ?>" width="400" height="300" alt=""> 
<?php } ?>

				</center>
			</div> 
<footer class="w3-container w3-blue"  style="dispay:inline-block; width=100%; left:0px; bottom:0px;">

</footer>
		</div>
</div>
</div>

<script type='text/javascript'>


function uploadImage(nombre) {
  var fI="fileToUpload"; 
  var st="status";
  var filesInput = document.getElementById(fI);
  var status = document.getElementById(st);
  var totalFiles= filesInput.files.length;

  //alert("entreo");

  if (filesInput.files.length === 0) {
    status.textContent = "Por favor seleccione un archivo.";
    return;
  }

  var file = filesInput.files[0];

  if (file.size > 500 * 1024) {
    status.textContent = "El archivo es demasiado grande. Por favor seleccione un archivo de menos de 500 KB.";
    return;
  }


  var formData = new FormData();

		// Read selected files
    		for (var index = 0; index < totalFiles; index++) {
      			formData.append("files[]", filesInput.files[index]);
    		}



      formData.append("nombrearchivo",nombre);
		var uploadUrl = getUploadUrl();
//		alert(uploadUrl);
//	alert(nombre);
       axios.post(uploadUrl, formData).then(function(response) {
		console.log("El archivo PDF se cargó correctamente en el servidor en la nube.");
			   history.back(); //Go to the previous page
		   })
		   .catch(function(error){
		           console.error("Error al cargar el archivo PDF en el servidor en la nube. Código de estado:", error);
        	});
}


function getUploadUrl() {
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargafoto.php" : url + "/cargafoto.php";
}

























function fpostulacion(){
	document.getElementById("p1").innerHTML = "<div class='w3-card-2' style='height:100%; position:relative;'><header class='w3-containar w3-blue' style='padding:10px'><p>¿En que consiste la postulación</p></header> <div class='w3-container' style='padding:10; font-size:20px;'><p> La postulación es el proceso en el cual el aspirante a magister debe compobar con documentos, una evaluación y una entrevista si esta habilitado para ingredar al programa de maestría que ofrece la Universidad Técnica Luis Vargas Torres de Esmeraldas.</p> <p> Si sientes que esta prepara, comienza  <a href='Portafolio/postulacion'> <button class='w3-button w3-black'>Aquí</button></a></p> </div> <footer class='w3-container w3-green' style='position:absolute; bottom:0; left:0; width:100%; padding:10px;'> <a href='Portafolio/postulacion'> Comienza a postular </a> </footer></div>";

}

</script>
