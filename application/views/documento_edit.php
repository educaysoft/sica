<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open('documento/save_edit',array('id'=>'eys-form')); ?>
  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li> <?php echo anchor('documento', 'Cancelar'); ?></li>
  </ul>
</div>
<br>




<table>

<tr>
<td> Tipo de documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

 echo form_dropdown("idtipodocu",$options, $documento['idtipodocu']);  ?></td>
</tr>


  <tr>
     <td>iddocumento:</td>
     <td><?php echo form_input(array("name"=>'iddocumento','id'=>'iddocumento','value'=>$documento['iddocumento'],'placeholder'=>'Iddocumentos')) ?></td>
  </tr>
 
 <tr>
      <td>Fecha Elaboracion:</td>
      <td><?php echo form_input( array("name"=>'fechaelaboracion',"id"=>'fechaelaboracion',"value"=>$documento['fechaelaboracion'],'type'=>'date','placeholder'=>'fechaelaboracion')); ?></td>
  </tr>

  <tr>
      <td>Fecha Recepcion:</td>
      <td><?php echo form_input('fechaentrerecep',$documento['fechaentrerecep'],array('type'=>'date', 'placeholder'=>'fechaentrerecep')) ?></td>
  </tr>

  <tr>
      <td>Emisor/es:</td>
      <td><?php
 	$options = array();
  	foreach ($emisores as $row){
		$options[$row->idpersona]=$row->elemisor;
	}


 echo form_multiselect('idemisor[]',$options,(array)set_value('idemisor', ''),array('id'=>"idemisor")); ?></td>
  </tr>


  <tr>
      <td>Destinatarios/as:</td>
      <td><?php
	$options=array();
  	foreach ($destinatarios as $row){
		$options[$row->idpersona]=$row->nombres;
	}


 echo form_multiselect('iddestinatario[]',$options,(array)set_value('iddestinatario', '')); ?></td>
  </tr>









<tr>
  <td>Asunto:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto" );    
echo form_textarea('asunto',$documento['asunto'],$textarea_options ); ?></td>
 </tr>


  <tr>
     <td>Archivo_Pdf</td>
     <td>
      <div style="display: inline-block";>
      <div style="float: left;">
      <?php 
  echo form_input(array("name"=>'archivopdf',"id"=>'archivopdf','value'=>$documento['archivopdf'],'style'=>"width:300;"));
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
      <td>Observacion:</td>
      <td><?php
 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"observacion" );    
 
 echo form_textarea('observacion',$documento['observacion'],$textarea_options) ?></td>
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
			//$url= base_url()."index.php/documento/loadpdf3";
                        $url= "https://".$options[$documento['idordenador']];
			if(substr($url,-1) == '/'){
			$url= $url."cargafile.php";
			}else{
			$url= $url."/cargafile.php";
			}

			$js='onClick="uploadFiles(\''.$url.'\')"';     
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
     echo form_dropdown($name="idordenador",$options, $documento['idordenador'],array('onchange'=>'get_directorio()'));  ?></td>
</tr>

<tr>
    <td>Directorio:</td>

    <td>
<div class="form-group">
                    <select class="form-control" id="iddirectorio" name="iddirectorio" required>
                        <option>No Selected</option>
<?php
    $options= array('--Select--');
    foreach ($directorios as $row){
	    if($documento['iddirectorio']==$row->iddirectorio)
		{
	    echo '<option selected="selected"  value="'.$row->iddirectorio.'">'.$row->ruta.'</option>'; 
	    }else{
	    echo '<option value="'.$row->iddirectorio.'">'.$row->ruta.'</option>'; 
	    }
    }
?>

                    </select>
                  </div>



</td>

</tr>

|
<tr>
<td> Estado del documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documento_estados as $row){
	$options[$row->iddocumento_estado]= $row->nombre;
}

 echo form_dropdown("iddocumento_estado",$options, $documento['iddocumento_estado']);  ?></td>
</tr>



   

</table>
<?php echo form_close(); ?>

   <script>



function get_directorio() {
	var idordenador = $('select[name=idordenador]').val();
 // alert(idordenador);  
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
function uploadFiles(url) {

  var totalfiles = document.getElementById('files').files.length;
  alert(url);	
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
</script>



