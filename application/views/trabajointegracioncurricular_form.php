<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<?php echo form_open("trabajointegracioncurricular/save",array('id'=>'eys-form')); ?>
<br>



<?php echo form_hidden("idtrabajointegracioncurricular");  
	date_default_timezone_set('America/Guayaquil');
	$fecha = date("Y-m-d");
?>











<div class="form-group row">
<label class="col-md-2 col-form-label">Nombre/título:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'maxlength'=>'200', 'style'=> 'width:50%;height:100px;', "placeholder"=>"nombre",'id'=>'nombre' );    
 echo form_textarea("nombre","", $textarea_options); 
?><div id="textarea_feedback"></div>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Descripción:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"resumen",'id'=>'resumen' );    
 echo form_textarea("resumen","", $textarea_options); 
?>
</div>
</div>














<div id="eys-nav-i">
	<ul>
		<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('trabajointegracioncurricular', 'Cancelar'); ?></li>
	</ul>
</div>

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








//=====================
//
// Upload file
//====================			
function uploadFiles(url1) {

	var filesInput = document.getElementById('files');
	var totalFiles= filesInput.files.length;

	if(totalFiles <= 0){
		alert("Por favor seleccione un archivo");
		return;
	}
 
  	var formData = new FormData();

    formData.append("idtrabajointegracioncurricular",0);
    formData.append("idtipodocu",getValueById('idtipodocu'));
    formData.append("iddestinotrabajointegracioncurricular",getValueById('iddestinotrabajointegracioncurricular'));
    formData.append("asunto", getValueById('asunto'));
    formData.append("descripcion", getValueById('descripcion'));
    formData.append("fechaelaboracion",getValueById('fechaelaboracion'));
    formData.append("fechasubida",getValueById('fechasubida'));
    formData.append("idordenador", getValueById('idordenador'));
    formData.append("iddirectorio",getValueById('iddirectorio'));
    formData.append("iddtrabajointegracioncurricular_estado",1);
    formData.append("idpersona",getValueById('idpersona')); 
    formData.append("idtrabajointegracioncurricular_estado",getValueById('idtrabajointegracioncurricular_estado'));



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
		console.log('El archivo PDF se cargó correctamente en el servidor en la nube.');
			   history.back(); //Go to the previous page
		   })
		   .catch(function(error){
		           console.error('Error al cargar el archivo PDF en el servidor en la nube. Código de estado:', error);
        	});
		   })
		 .catch(function(error){
	    		console.error('Error al guardar los datos.', error);
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
        url: "<?php echo site_url('trabajointegracioncurricular/get_directorio') ?>",
        data: {idordenador: idordenador},
        method: 'POST',
	async : true,
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
 indice=document.getElementById("idtrabajointegracioncurricular").value;
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
