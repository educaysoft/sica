<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<?php echo form_open("documento/save",array('id'=>'eys-form')); ?>
<br>



<?php echo form_hidden("iddocumento");  
	date_default_timezone_set('America/Guayaquil');
	$fecha = date("Y-m-d");
?>
<div class="form-group row">
	<label class="col-md-2 col-form-label">Fecha elaboración:</label>
		<div class="col-md-10">
			<?php
 				echo form_input(array("name"=>"fechaelaboracion","id"=>"fechaelaboracion","value"=>$fecha,"type"=>"date"));  
			?>
		</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label">Fecha subida:</label>
		<div class="col-md-10">
			<?php
 				echo form_input(array("name"=>"fechasubida","id"=>"fechasubida","value"=>$fecha,"type"=>"date"));  
			?>
		</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label">Quién la elabora?:(<?php echo anchor('persona/add', 'Nuevo');?>) :</label>
		<div class="col-md-10">
		<?php
			$options= array('--Select--');
			foreach ($personas as $row){
			$options[$row->idpersona]= $row->lapersona;
		}
 		echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'),array('id'=>'idpersona')); 
		?>
	</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Asunto/título:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'maxlength'=>'200', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto",'id'=>'asunto' );    
 echo form_textarea("asunto","", $textarea_options); 
?><div id="textarea_feedback"></div>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Descripción:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion",'id'=>'descripcion' );    
 echo form_textarea("descripcion","", $textarea_options); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Ordenador destino:</label>
<div class="col-md-10">
<?php

    $options= array('--Select--');
    foreach ($ordenadores as $row){
      $options[$row->idordenador]= $row->nombre;
    }
     echo form_dropdown($name="idordenador",$options, set_select('--Select--','default_value'),array('id'=>'idordenador','onchange'=>'get_directorio()'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Directorio:</label>
<div class="col-md-10">
    <div class="form-group">
         <select class="form-control" id="iddirectorio" name="iddirectorio" required>
                 <option>No Selected</option>
          </select>
    </div>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo de documento:</label>
<div class="col-md-10">
<?php
    $options= array('--Select--');
    foreach ($tipodocus as $row){
      $options[$row->idtipodocu]=$row->idtipodocu.' - '.$row->descripcion;
    }
     echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'),array('id'=>'idtipodocu')); 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Destino de documento:</label>
<div class="col-md-10">
<?php
    $options= array('--Select--');
    foreach ($destinodocumentos as $row){
      $options[$row->iddestinodocumento]= $row->nombre;
    }
     echo form_dropdown("iddestinodocumento",$options, set_select('--Select--','default_value'),array('id'=>'iddestinodocumento')); 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Cargar pdf:</label>
<div class="col-md-10">


	<div style="display: inline-block";>
		<div style="float: left;">
			<?php 
			$upload_data = array('type' => 'file','name' => 'files','id' => 'files');
			echo form_upload($upload_data );?>
		</div>
		<div style="float: left;">
			<?php 
    			$options= array('--Select--');
    			foreach ($ordenadores as $row){
      				$options[$row->idordenador]= $row->nombre;
   			}
			// url de la funcion php que carga el archivo en el 
			$url1= base_url()."index.php/documento/save";
			$js='onClick="cargarFile(\''.$url1.'\')"';     
			echo form_button("carga","cargar a directorio",$js); ?>
		</div> 
	</div>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Estado del documento:</label>
<div class="col-md-10">



<div style="display: inline-block";>
<div style="float: left;">
<?php
$options= array('--Select--');
foreach ($documento_estados as $row){
	$options[$row->iddocumento_estado]= $row->nombre;
}

echo form_dropdown("iddocumento_estado",$options, set_select('--Select--','default_value'),array('id'=>"iddocumento_estado")); 

?>
		</div> 
	</div>
</div>
</div>


<!--- 
<div id="eys-nav-i">
	<ul>
		<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('documento', 'Cancelar'); ?></li>
	</ul>
</div>
--->
<?php echo form_close();?>
  <script>
	$(document).ready(function(){
  		var text_max = 200;
    		$('#textarea_feedback').html('Quedan ' + text_max + ' caracteres');
    		$('#asunto').keyup(function() {
        	var text_length = $('#asunto').val().length;
        	var text_remaining = text_max - text_length;
        	$('#textarea_feedback').html('Quedan ' + text_remaining + ' caracteres');
    });
		
});




function cargarFile(url1)
{
	var formDataJson = {
    		iddocumento: 0,
    		idtipodocu: getValueById("idtipodocu"),
    		iddestinodocumento: getValueById("iddestinodocumento"),
    		asunto: getValueById("asunto"),
    		descripcion: getValueById("descripcion"),
    		fechaelaboracion: getValueById("fechaelaboracion"),
    		fechasubida: getValueById("fechasubida"),
    		idordenador: getValueById("idordenador"),
    		iddirectorio: getValueById("iddirectorio"),
    		iddocumento_estado: 1,
    		idpersona: getValueById("idpersona"),
    		iddocumento_estado: getValueById("iddocumento_estado")
	};

	// Llamar a la función uploadFiles con la URL de destino y los valores del formulario en forma de objeto JSON
	uploadFiles(url1, formDataJson);
}


//=====================
// Upload file
//====================			
function uploadFiles(url1,formDataJson) {

	var filesInput = document.getElementById("files");
	var totalFiles= filesInput.files.length;

	if(totalFiles <= 0){
		alert("Por favor seleccione un archivo");
		return;
	}
 
// Crear objeto FormData para enviar datos del formulario al servidor
    var formData = new FormData();
    for (var key in formDataJson) {
        formData.append(key, formDataJson[key]);
    }

 axios.post(url1, formData)
        .then(function(response) {
    var result_array = response.data;
		var uformData = new FormData();
		
		// Read selected files
    		for (var index = 0; index < totalFiles; index++) {
      			uformData.append("files[]", filesInput.files[index]);
    		}
      		uformData.append("archivopdf",result_array.archivopdf );
		var uploadUrl = getUploadUrl();
		alert(uploadUrl);
       axios.post(uploadUrl, uformData)
                .then(function(response) {
		console.log("El archivo PDF se cargó correctamente en el servidor en la nube.");
			   history.back(); //Go to the previous page
		   })
		   .catch(function(error){
		           console.error("Error al cargar el archivo PDF en el servidor en la nube. Código de estado:", error);
        	});
		   })
		 .catch(function(error){
	    		console.error("Error al guardar los datos.", error);
        	});
}


function getValueById(id) {
    return document.getElementById(id).value;
}


function getUploadUrl() {
    var selectElement = document.getElementById('idordenador');
    var url = "https://" + selectElement.options[selectElement.selectedIndex].text;
    return url.endsWith('/') ? url + "cargafile.php" : url + "/cargafile.php";
}




function get_directorio() {
	var idordenador = $('select[name=idordenador]').val();
    $.ajax({
        url: "<?php echo site_url('documento/get_directorio') ?>",
        data: {idordenador: idordenador},
        method: 'POST',
	async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddirectorio+'>'+data[i].ruta+'</option>';
        }
        $('#iddirectorio').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}








  async function nombredearchivo()
{
 indice=document.getElementById("iddocumento").value;
 fecha=document.getElementById("fechaelaboracion").value;
 var emisor=document.getElementById("idemisor");
if(emisor.length>0)
{
     var emisor1=emisor.options[0].text;
     var emisor2=emisor1.split(/\W+/);
     var initial="";
     for( var i=0; i<emisor2.length; i++)
      {
       initial=initial+emisor2[i].toUpperCase().charAt(0);
      }
      initial=fecha+"-"+initial+'-'+indice.padStart(6,"0")+".pdf";
//      alert(initial);
      document.getElementById("archivopdf").value=initial;
}

};

    async function cargaarchivo(url)
{
    
    let formData = new FormData(); 
	formData.append("filepdf",document.getElementById('filepdf').files[02]);
	formData.append("archivopdf",document.getElementById('archivopdf').value);

	await fetch(url, {method: "POST", body: formData})

.then(response => {
        if (response.ok) {
            console.log('El archivo PDF se cargó correctamente en el servidor en la nube.');
 	 alert('The file has been uploaded successfully.');
        } else {
            console.error('Error al cargar el archivo PDF en el servidor en la nube.');
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
	}); 

};


</script>
