<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($calidadcarrera))
{
?>
        <li> <?php echo anchor('calidadcarrera/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('calidadcarrera/siguiente/'.$calidadcarrera['idcalidadcarrera'], 'siguiente'); ?></li>
        <li> <?php echo anchor('calidadcarrera/anterior/'.$calidadcarrera['idcalidadcarrera'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('calidadcarrera/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('calidadcarrera/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('calidadcarrera/edit/'.$calidadcarrera['idcalidadcarrera'],'Edit'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('calidadcarrera/delete/'.$calidadcarrera['idcalidadcarrera'],'Delete'); ?></li> --->
        <li> <?php echo anchor('calidadcarrera/listar/','Listar'); ?></li>
        <li> <?php echo anchor('calidadcarrera/genpagina/1','generar web'); ?></li>
        <li> <?php echo anchor('calidadcarrera/calidadcarrera_1','Web'); ?></li>
		<li> <?php echo anchor('calidadcarrera/reportepdf/'.$calidadcarrera['iddepartamento'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('calidadcarrera/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idcalidadcarrera',$calidadcarrera['idcalidadcarrera']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idcalidadcarrera",  "name"=>'idcalidadcarrera','value'=>$calidadcarrera['idcalidadcarrera'],"disabled"=>"disabled",'placeholder'=>'Idcalidadcarreras','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php


$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('nombre',$calidadcarrera['nombre'],$textarea_options); 

		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$calidadcarrera['detalle'],$textarea_options); 
		?>
	</div> 
</div>
  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Archivo:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('archivo',$calidadcarrera['archivo'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('criteriocalidad/actual/'.$calidadcarrera['idcriteriocalidad'], 'Criterio:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($criteriocalidads as $row){
	$options[$row->idcriteriocalidad]= $row->nombre;
}

echo form_input('idcriteriocalidad',$options[$calidadcarrera['idcriteriocalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('subcriteriocalidad/actual/'.$calidadcarrera['idsubcriteriocalidad'], 'Sub criterio:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($subcriteriocalidads as $row){
	$options[$row->idsubcriteriocalidad]= $row->nombre;
}

echo form_input('idsubcriteriocalidad',$options[$calidadcarrera['idsubcriteriocalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('indicadorcalidad/actual/'.$calidadcarrera['idindicadorcalidad'], 'Indicador:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($indicadorcalidads as $row){
	$options[$row->idindicadorcalidad]= $row->nombre;
}

echo form_input('idindicadorcalidad',$options[$calidadcarrera['idindicadorcalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Código:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'codigo','value'=>$calidadcarrera['codigo'],"disabled"=>"disabled",'placeholder'=>'Orden','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipocalidad/actual/'.$calidadcarrera['idtipocalidad'], 'tipocalidad:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($tipocalidads as $row){
	$options[$row->idtipocalidad]= $row->nombre;
}

echo form_input('idtipocalidad',$options[$calidadcarrera['idtipocalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://repositorioutlvte.org/Repositorio/calidadcarrera/calidadcarrera<?php echo $calidadcarrera['idcalidadcarrera']; ?>.jpg" alt="calidadcarrera" width="400" height="300"> 
  

	</div> 
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($calidadcarrera['idcalidadcarrera']); ?>" accept="image/*">
  <button onclick="uploadImage('calidadcarrera<?php echo trim($calidadcarrera['idcalidadcarrera']); ?>.jpg','<?php echo trim($calidadcarrera['idcalidadcarrera']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($calidadcarrera['idcalidadcarrera']); ?>"></p> </div>';


</div>















<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idcalidadcarrera=document.getElementById("idcalidadcarrera").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('calidadcarrera/ubicacion_data')?>', type: 'GET',data:{idcalidadcarrera:idcalidadcarrera}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('calidadcarrera/prestamo_data')?>', type: 'GET',data:{idcalidadcarrera:idcalidadcarrera}},});
});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacioncalidadcarrera');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamocalidadcarrera');
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
    var selectElement = document.getElementById("idcodigoador");
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargaimagenformato.php" : url + "/cargaimagenformato.php";
}










</script>


</body>









</html>
