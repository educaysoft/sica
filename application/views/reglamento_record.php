<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($reglamento))
{
?>
        <li> <?php echo anchor('reglamento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('reglamento/siguiente/'.$reglamento['idreglamento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('reglamento/anterior/'.$reglamento['idreglamento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('reglamento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('reglamento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('reglamento/edit/'.$reglamento['idreglamento'],'Edit'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('reglamento/delete/'.$reglamento['idreglamento'],'Delete'); ?></li> --->
        <li> <?php echo anchor('reglamento/listar/','Listar'); ?></li>
        <li> <?php echo anchor('reglamento/genpagina/1','generar web'); ?></li>
        <li> <?php echo anchor('reglamento/reglamento_1','Web'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('reglamento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idreglamento',$reglamento['idreglamento']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idreglamento",  "name"=>'idreglamento','value'=>$reglamento['idreglamento'],"disabled"=>"disabled",'placeholder'=>'Idreglamentos','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$reglamento['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$reglamento['detalle'],$textarea_options); 
		?>
	</div> 
</div>
  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Archivo:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('archivo',$reglamento['archivo'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('proceso/actual/'.$reglamento['idproceso'], 'El trámite:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($procesos as $row){
	$options[$row->idproceso]= $row->nombre;
}

echo form_input('idproceso',$options[$reglamento['idproceso']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Orden:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'orden','value'=>$reglamento['orden'],"disabled"=>"disabled",'placeholder'=>'Orden','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://repositorioutlvte.org/Repositorio/reglamento/reglamento<?php echo $reglamento['idreglamento']; ?>.jpg" alt="reglamento" width="400" height="300"> 
  

	</div> 
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($reglamento['idreglamento']); ?>" accept="image/*">
  <button onclick="uploadImage('reglamento<?php echo trim($reglamento['idreglamento']); ?>.jpg','<?php echo trim($reglamento['idreglamento']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($reglamento['idreglamento']); ?>"></p> </div>';


</div>















<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idreglamento=document.getElementById("idreglamento").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('reglamento/ubicacion_data')?>', type: 'GET',data:{idreglamento:idreglamento}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('reglamento/prestamo_data')?>', type: 'GET',data:{idreglamento:idreglamento}},});
});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacionreglamento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoreglamento');
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
    var selectElement = document.getElementById("idordenador");
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargaimagenreglamento.php" : url + "/cargaimagenreglamento.php";
}










</script>


</body>









</html>
