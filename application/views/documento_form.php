<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<?php echo form_open("documento/save",array('id'=>'eys-form')); ?>

<br>



<?php echo form_hidden("iddocumento")  ?>


<div class="form-group row">
	<label class="col-md-2 col-form-label">Fecha elaboración:</label>
		<div class="col-md-10">
			<?php
 				echo form_input(array("name"=>"fechaelaboracion","id"=>"fechaelaboracion","type"=>"date"));  
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
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto",'id'=>'asunto' );    
 echo form_textarea("asunto","", $textarea_options); 
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
      $options[$row->idtipodocu]= $row->descripcion;
    }
     echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'),array('id'=>'idtipodocu')); 
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
			$js='onClick="uploadFiles(\''.$url1.'\')"';     
			echo form_button("carga","cargar a directorio",$js); ?>
		</div> 
	</div>
</div>
</div>





<div id="eys-nav-i">
	<ul>
		<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('documento', 'Cancelar'); ?></li>
	</ul>
</div>

<?php echo form_close();?>
    
  <script>


//=====================
//
// Upload file
//====================			
function uploadFiles(url1) {

  var totalfiles = document.getElementById('files').files.length;
  var formData = new FormData();
  alert("Este proceso guardará todas los datos ingresados");	
  if(totalfiles > 0 ){

    var iddocumento = 0;
    var idtipodocu = document.getElementById('idtipodocu').value;
    var asunto =  document.getElementById('asunto').value;
    var fechaelaboracion = document.getElementById('fechaelaboracion').value;
    var idordenador =  document.getElementById('idordenador').value;
    var iddirectorio = document.getElementById('iddirectorio').value;
    var idddocumento_estado = 1;
    var idpersona = document.getElementById('idpersona').value;


    formData.append("iddocumento", 0);
    formData.append("idtipodocu", idtipodocu);
    formData.append("asunto", asunto);
    formData.append("fechaelaboracion", fechaelaboracion);
    formData.append("idordenador", idordenador);
    formData.append("iddirectorio", iddirectorio);
    formData.append("iddocumento_estado", 1);
    formData.append("idpersona", idpersona);

    var xhttp1 = new XMLHttpRequest();


    xhttp1.open("POST", url1, true);
    xhttp1.send(formData);

    xhttp1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		alert(this.responseText);
		//Recupera el nombre del archivo
		var result_array = JSON.parse(this.responseText);
		//document.getElemetById("archivopdf").value=result_array.archivopdf;
		 alert("Guardado exitoso...ahora procedemos a cargar el archivo..con un nuevo nombre"+result_array.archivopdf);
		//Para cargar el archivo	
		var formData = new FormData();
   	 	// Read selected files
    		for (var index = 0; index < totalfiles; index++) {
      			formData.append("files[]", document.getElementById('files').files[index]);
    		}
      		formData.append("archivopdf",result_array.archivopdf );
    		var xhttp = new XMLHttpRequest();
		var e =document.getElementById('idordenador');
		var url2 = "https://"+e.options[e.selectedIndex].text;

		if(url2.slice(-1) == '/'){
			url2 = url2+"cargafile.php";
		}else{
			url2 = url2+"/cargafile.php";
		}
                alert("Se va a ejecutar "+ url2);	
    		// Set POST method and ajax file path
    		xhttp.open("POST", url2, true);

    		// call on request changes state
    		xhttp.onreadystatechange = function() {
 		if(xhttp.readyState === XMLHttpRequest.DONE) {
    			var status = xhttp.status;
    			if (status ===  0 || (status >= 200 && status < 400)) {
      				// The request has been completed successfully
				var response = xhttp.responseText;
          			alert(response + "archivo cargado");
				history.back(); //Go to the previous page
       			}else{
				alert("No se pudo cargar el archivo");
			}
			}
              	};
    		// Send request with data
    		xhttp.send(formData);
	}else{
		 alert("intento de guardar fallado");
	}
	};
  }else{
    alert("Porfavor seleccione un archivo");
  }

}





function get_directorio() {
	var idordenador = $('select[name=idordenador]').val();
    $.ajax({
        url: "<?php echo site_url('documento/get_directorio') ?>",
        data: {idordenador: idordenador},
        method: 'GET',
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
//    formData.append("filepdf", filepdf.files[0]);
formData.append("filepdf",document.getElementById('filepdf').files[02]);
formData.append("archivopdf",document.getElementById('archivopdf').value);

    await fetch(url, {method: "POST", body: formData}); 
  alert('The file has been uploaded successfully.');

};


//=====================
//
// Upload file
/*
function uploadFiles(url) {

  var totalfiles = document.getElementById('files').files.length;

  if(totalfiles > 0 ){

    var formData = new FormData();

    // Read selected files
    for (var index = 0; index < totalfiles; index++) {
      formData.append("files[]", document.getElementById('files').files[index]);
    }
      formData.append("archivopdf", document.getElementById('archivopdf').value);
     alert(document.getElementById('archivopdf').value);
    var xhttp = new XMLHttpRequest();

    // Set POST method and ajax file path
    xhttp.open("POST", url, true);

    // call on request changes state
    xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {

          var response = this.responseText;

          alert(response + " File uploaded.");

       }
    };

    // Send request with data
    xhttp.send(formData);

  }else{
    alert("Please select a file");
  }

}
*/
</script>
