<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($fotoevidencia))
{
?>
        <li> <?php echo anchor('fotoevidencia/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('fotoevidencia/siguiente/'.$fotoevidencia['idfotoevidencia'], 'siguiente'); ?></li>
        <li> <?php echo anchor('fotoevidencia/anterior/'.$fotoevidencia['idfotoevidencia'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('fotoevidencia/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('fotoevidencia/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('fotoevidencia/edit/'.$fotoevidencia['idfotoevidencia'],'Edit'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('fotoevidencia/delete/'.$fotoevidencia['idfotoevidencia'],'Delete'); ?></li> --->
        <li> <?php echo anchor('fotoevidencia/listar/','Listar'); ?></li>
        <li> <?php echo anchor('fotoevidencia/genpagina/1','generar web'); ?></li>
        <li> <?php echo anchor('fotoevidencia/fotoevidencia_1','Web'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('fotoevidencia/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idfotoevidencia',$fotoevidencia['idfotoevidencia']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idfotoevidencia",  "name"=>'idfotoevidencia','value'=>$fotoevidencia['idfotoevidencia'],"disabled"=>"disabled",'placeholder'=>'Idfotoevidencias','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$fotoevidencia['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$fotoevidencia['detalle'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha tomada:</label>
	<div class="col-md-10">
	<?php
      echo form_input('fechatomada',$fotoevidencia['fechatomada'],array("disabled"=>"disabled",'placeholder'=>'Fechanacimiento','style'=>'width:600px;')) ;
	?>
	</div> 
</div>

 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://repositorioutlvte.org/Repositorio/fotoevidencias/fotoevidencia<?php echo $fotoevidencia['idfotoevidencia']; ?>.jpg" alt="fotoevidencia" width="400" height="300"> 
  

	</div> 
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($fotoevidencia['idfotoevidencia']); ?>" accept="image/*">
  <button onclick="uploadImage('fotoevidencia<?php echo trim($fotoevidencia['idfotoevidencia']); ?>.jpg','<?php echo trim($fotoevidencia['idfotoevidencia']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($fotoevidencia['idfotoevidencia']); ?>"></p> </div>';


</div>















<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idfotoevidencia=document.getElementById("idfotoevidencia").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('fotoevidencia/ubicacion_data')?>', type: 'GET',data:{idfotoevidencia:idfotoevidencia}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('fotoevidencia/prestamo_data')?>', type: 'GET',data:{idfotoevidencia:idfotoevidencia}},});
});




function uploadImage(nombre,idx) {
  var fI="fileInput"+idx; 
  var st="status"+idx;
  var filesInput = document.getElementById(fI);
  var status = document.getElementById(st);
  var totalFiles= filesInput.files.length;

    alert("entreo");

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
		alert(uploadUrl);
		alert(nombre);
       axios.post(uploadUrl, formData).then(function(response) {
		console.log("El archivo PDF se cargó correctamente en el servidor en la nube.");
			   history.back(); //Go to the previous page
		   })
		   .catch(function(error){
		           console.error("Error al cargar el archivo PDF en el servidor en la nube. Código de estado:", error);
        	});
}


function getUploadUrl() {
    var selectElement = document.getElementById("idordenador");
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargafotoevidencia.php" : url + "/cargafotoevidencia.php";
}










</script>


</body>









</html>
