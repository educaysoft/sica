<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($informacioncarrera))
{
?>
        <li> <?php echo anchor('informacioncarrera/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('informacioncarrera/siguiente/'.$informacioncarrera['idinformacioncarrera'], 'siguiente'); ?></li>
        <li> <?php echo anchor('informacioncarrera/anterior/'.$informacioncarrera['idinformacioncarrera'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('informacioncarrera/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('informacioncarrera/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('informacioncarrera/edit/'.$informacioncarrera['idinformacioncarrera'],'Edit'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('informacioncarrera/delete/'.$informacioncarrera['idinformacioncarrera'],'Delete'); ?></li> --->
        <li> <?php echo anchor('informacioncarrera/listar/','Listar'); ?></li>
        <li> <?php echo anchor('informacioncarrera/genpagina/1','generar web'); ?></li>
        <li> <?php echo anchor('informacioncarrera/informacioncarrera_1','Web'); ?></li>
		<li> <?php echo anchor('informacioncarrera/reportepdf/'.$informacioncarrera['iddepartamento'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('informacioncarrera/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idinformacioncarrera',$informacioncarrera['idinformacioncarrera']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idinformacioncarrera",  "name"=>'idinformacioncarrera','value'=>$informacioncarrera['idinformacioncarrera'],"disabled"=>"disabled",'placeholder'=>'Idinformacioncarreras','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('nombre',$informacioncarrera['nombre'],$textarea_options); 
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$informacioncarrera['detalle'],$textarea_options); 
		?>
	</div> 
</div>
  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Archivo:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('archivo',$informacioncarrera['archivo'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('criteriocalidad/actual/'.$informacioncarrera['idcriteriocalidad'], 'Criterio:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($criteriocalidads as $row){
	$options[$row->idcriteriocalidad]= $row->nombre;
}

echo form_input('idcriteriocalidad',$options[$informacioncarrera['idcriteriocalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('subcriteriocalidad/actual/'.$informacioncarrera['idsubcriteriocalidad'], 'Sub criterio:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($subcriteriocalidads as $row){
	$options[$row->idsubcriteriocalidad]= $row->nombre;
}

echo form_input('idsubcriteriocalidad',$options[$informacioncarrera['idsubcriteriocalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('indicadorcalidad/actual/'.$informacioncarrera['idindicadorcalidad'], 'Indicador:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($indicadorcalidads as $row){
	$options[$row->idindicadorcalidad]= $row->nombre;
}

echo form_input('idindicadorcalidad',$options[$informacioncarrera['idindicadorcalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Socilicitante:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'solicitante','value'=>$informacioncarrera['solicitante'],"disabled"=>"disabled",'placeholder'=>'Orden','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://repositorioutlvte.org/Repositorio/informacioncarrera/informacioncarrera<?php echo $informacioncarrera['idinformacioncarrera']; ?>.jpg" alt="informacioncarrera" width="400" height="300"> 
  

	</div> 
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($informacioncarrera['idinformacioncarrera']); ?>" accept="image/*">
  <button onclick="uploadImage('informacioncarrera<?php echo trim($informacioncarrera['idinformacioncarrera']); ?>.jpg','<?php echo trim($informacioncarrera['idinformacioncarrera']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($informacioncarrera['idinformacioncarrera']); ?>"></p> </div>';


</div>















<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idinformacioncarrera=document.getElementById("idinformacioncarrera").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('informacioncarrera/ubicacion_data')?>', type: 'GET',data:{idinformacioncarrera:idinformacioncarrera}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('informacioncarrera/prestamo_data')?>', type: 'GET',data:{idinformacioncarrera:idinformacioncarrera}},});
});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacioninformacioncarrera');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoinformacioncarrera');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
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
    var selectElement = document.getElementById("idsolicitanteador");
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargaimagenformato.php" : url + "/cargaimagenformato.php";
}










</script>


</body>









</html>
