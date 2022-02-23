<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

	<?php echo form_open("documento/save",array('id'=>'eys-form')); ?>
	<ul>
   		 <li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('documento', 'Cancelar'); ?></li>
	</ul>
</div>
<br>



<?php echo form_hidden("iddocumento")  ?>
<table>


<tr>
<td> fecha elaboracion </td>
<td><?php echo form_input(array("name"=>"fechaelaboracion","id"=>"fechaelaboracion","type"=>"date"));  ?></td>
</tr>



<tr>
<td> Quién la elabora?:(<?php echo anchor('persona/add', 'Nuevo'); ?>) </td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->lapersona;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'),array('id'=>'idpersona'));  ?></td>
</tr>


<tr>
<td> asunto/título </td>
<td><?php 
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto",'id'=>'asunto' );    
    
 echo form_textarea("asunto","", $textarea_options)  ?></td>
</tr>





<tr>
     <td>Archivo_Pdf</td>
     <td>
      	<div style="display: inline-block";>
      		<div style="float: left;">
      		<?php 
  			echo form_input(array("name"=>'archivopdf',"id"=>'archivopdf',"disabled"=>'disabled','style'=>"width:300;"));
		?>
		</div>
		<div style="float: left;">
		<?php 
			$url= base_url()."index.php/documento/loadpdf";
			//$js='onClick="cargaarchivo(\''.$url.'\')"';     
			$js='onClick="nombredearchivo()"';     
			echo form_button("carga","cargar archivo",$js); ?>
		</div> 
	</div>
	</td>
</tr>




<tr>
     <td>carga archivo pdf</td>
<td>

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
                        //$url2= "https://".$options[$documento['idordenador']];
		//	if(substr($url2,-1) == '/'){
			//	$url2= $url2."cargafile.php";
		//	}else{
			//	$url2= $url2."/cargafile.php";
		//	}
			$js='onClick="uploadFiles(\''.$url1.'\')"';     
			echo form_button("carga","cargar a directorio",$js); ?>
		</div> 
	</div>
</td>
</tr>







<tr>
    <td>Ordenador destino:</td>
    <td><?php
    $options= array('--Select--');
    foreach ($ordenadores as $row){
      $options[$row->idordenador]= $row->nombre;
    }
     echo form_dropdown($name="idordenador",$options, set_select('--Select--','default_value'),array('id'=>'idordenador','onchange'=>'get_directorio()'));  ?></td>
</tr>

<tr>
    <td>Directorio:</td>
    <td>
    <div class="form-group">
         <select class="form-control" id="iddirectorio" name="iddirectorio" required>
                 <option>No Selected</option>
          </select>
    </div>

</td>

</tr>


<tr>
    <td> Tipo de documento:</td>
    <td><?php
    $options= array('--Select--');
    foreach ($tipodocus as $row){
      $options[$row->idtipodocu]= $row->descripcion;
    }
     echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'),array('id'=>'idtipodocu'));  ?></td>
</tr>


</table>



<?php echo form_close();?>
    
  <script>


//=====================
//
// Upload file
function uploadFiles(url1) {

  var totalfiles = document.getElementById('files').files.length;
  var formData = new FormData();
  alert(url1);	
  if(totalfiles > 0 ){

    var iddocumento = 0;
    var idtipodocu = document.getElementById('idtipodocu').value;
    var archivopdf = document.getElementById('archivopdf').value;
    var asunto =  document.getElementById('asunto').value;
    var fechaelaboracion = document.getElementById('fechaelaboracion').value;
    var idordenador =  document.getElementById('idordenador').value;
    var iddirectorio = document.getElementById('iddirectorio').value;
    var idddocumento_estado = 1;
    var idpersona = document.getElementById('idpersona').value;


    formData.append("iddocumento", 0);
    formData.append("idtipodocu", idtipodocu);
    formData.append("archivopdf", archivopdf);
    formData.append("asunto", asunto);
    formData.append("fechaelaboracion", fechaelaboracion);
    formData.append("idordenador", idordenador);
    formData.append("iddirectorio", iddirectorio);
    formData.append("iddocumento_estado", 1);
    formData.append("idpersona", idpersona);

    var xhttp1 = new XMLHttpRequest();

	// Display the values
//	for (var pair of formData.entries()) {
  // 		alert(pair[0]+' -  '+pair[1]);
//	}

    xhttp1.open("POST", url1, true);
    xhttp1.send(formData);

    xhttp1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		alert(this.responseText);

		//Recupera el nombre del archivo
		var result_array = JSON.parse(this.responseText);
		document.getElementById("archivopdf").value="HOLA";
    		alert(document.getElementById('archivopdf').value);
		//Para cargar el archivo	
		var formData = new FormData();
   	 	// Read selected files
    		for (var index = 0; index < totalfiles; index++) {
      			formData.append("files[]", document.getElementById('files').files[index]);
    		}
      		formData.append("archivopdf", document.getElementById('archivopdf').value);
     		alert(document.getElementById('archivopdf').value);
    		var xhttp = new XMLHttpRequest();
		var url2 = "https://"+document.getElementById('idordenador').value;
		if(url2.slice(-1) == '/'){
			url2 = url2+"cargafile.php";
		}else{
			url2 = url2+"/cargafile.php";
		}
	
    		// Set POST method and ajax file path
    		xhttp.open("POST", url2, true);

    		// Send request with data
    		xhttp.send(formData);
    		// call on request changes state
    		xhttp.onreadystatechange = function() {
       		if (this.readyState == 4 && this.status == 200) {
          		var response = this.responseText;
          		alert(response + " File uploaded.");
       		}else{
			alert("No se pudo cargar el archivo");
		}
              };
	}else{
	 alert("No se hizo el grabado 1");
	}
	};
  }else{
    alert("Porfavor seleccione un archivo");
  }

}





function get_directorio() {
	var idordenador = $('select[name=idordenador]').val();
  alert(idordenador);  
    $.ajax({
        url: "<?php echo site_url('documento/get_directorio') ?>",
        data: {idordenador: idordenador},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddirectorio+'>'+data[i].nombre+'</option>';
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
