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

 echo form_dropdown("idtipodocu",$options, $documento['idtipodocu'],array('id'=>'idtipodocu'));  ?></td>
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
      <td>Emisor/es:</td>
      <td><?php
 	$options = array();
  	foreach ($emisores as $row){
		$options[$row->idpersona]=$row->elemisor;
	}


 echo form_multiselect('idemisor[]',$options,(array)set_value('idpersona', ''),array('id'=>"idpersona")); ?></td>
  </tr>





<tr>
  <td>Asunto:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto","id" =>"asunto");    
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
			
			if($documento['iddocumento_estado']==3) //si ha sido generado
			{
				$js='onClick="generar_documento()"';     
				echo form_button("carga","volver a generar",$js); 
			}else{
			// url de la funcion php que carga el archivo en el 
			$url1= base_url()."index.php/documento/save";
			$js='onClick="uploadFiles(\''.$url1.'\')"';     

			echo form_button("carga","cargar a directorio",$js);

}
 ?>
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
     echo form_dropdown($name="idordenador",$options, $documento['idordenador'],array('onchange'=>'get_directorio()',"id"=>"idordenador"));  ?></td>
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

//=====================
//
// Upload file
function uploadFiles(url1) {

  var totalfiles = document.getElementById('files').files.length;
  alert("Este proceso guardará todas los datos ingresados");	
  if(totalfiles > 0 ){

    var iddocumento = 0;
    alert(1);
    var idtipodocu = document.getElementById('idtipodocu').value;
    alert(2);
    var archivopdf = document.getElementById('archivopdf').value;
    alert(3);
    var asunto =  document.getElementById('asunto').value;
    alert(4);
    var fechaelaboracion = document.getElementById('fechaelaboracion').value;
    alert(5);
    var idordenador =  document.getElementById('idordenador').value;
    alert(6);
    var iddirectorio = document.getElementById('iddirectorio').value;
    alert(7);
    var idddocumento_estado = 1;
    alert(8);
    var idpersona = document.getElementById('idpersona').value;
    alert(9);


		//Recupera el nombre del archivo
		 alert("Guardado exitoso...ahora procedemos a cargar el archivo..con un nuevo nombre"+archivopdf);
		//Para cargar el archivo	
		var formData = new FormData();
   	 	// Read selected files
    		for (var index = 0; index < totalfiles; index++) {
      			formData.append("files[]", document.getElementById('files').files[index]);
    		}
      		formData.append("archivopdf",archivopdf );
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
    			if (status === 0 || (status >= 200 && status < 400)) {
      				// The request has been completed successfully
				var response = xhttp.responseText;
          			alert(response + "archivo cargado");
				archivo_cargado(iddocumento);

				history.back(); //Go to the previous page
       			}else{
				alert("No se pudo cargar el archivo");
			}
			}
              	};
    		// Send request with data
    		xhttp.send(formData);
  }else{
    alert("Porfavor seleccione un archivo");
  }

}



function archivo_cargado(iddocumento) {
	var iddocumento_estado = 2;
    $.ajax({
        url: "<?php echo site_url('documento/save_edit') ?>",
        data: {iddocumento:iddocumento,iddocumento_estado:iddocumento_estado},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;

        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}












function get_directorio() {
	var idordenador = $('select[name=idordenador]').val();
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





function generar_documento()
{
      alert("entre");
	var iddocumento=document.getElementById("iddocumento").value;
   $.ajax({
        url: "<?php echo site_url('documento/get_parametros'); ?>",
        data: {iddocumento:iddocumento},
        method: 'POST',
	async :false ,
        dataType : 'json',
        success: function(data){
	iddocumento=data.iddocumento;
	iddocumento2=data.iddocumento;
 	archivopdf2= data.archivopdf;	
	if(iddocumento>0){

var idtipodocu= data.idtipodocu;

//alert(iddocumento);
var asunto="CERTIFICADO - "+data.titulo;

let fechaelaboracion=data.fechafinaliza;
	fechaelaboracion=fechaelaboracion.substring(0,10);
var idevento=data.idevento;
var idordenador=data.idordenador;
var iddirectorio=data.iddirectorio;
var iddocumento_estado=3;
var idpersona=data.idpersona;
var idparticipante=data.idparticipante;

var ancho_x=data.ancho_x;
var alto_y=data.alto_y;

var posi_nomb_x=data.posi_nomb_x;
var posi_nomb_y=data.posi_nomb_y;
var size_nombre=data.size_nombre;

var posi_codigo_x=data.posi_codigo_x;
var posi_codigo_y=data.posi_codigo_y;

var posi_fecha_x=data.posi_fecha_x;
var posi_fecha_y=data.posi_fecha_y;

var firma1_x=data.firma1_x;
var firma1_y=data.firma1_y;

var firma2_x=data.firma2_x;
var firma2_y=data.firma2_y;

var firma3_x=data.firma3_x;
var firma3_y=data.firma3_y;

var texto1=data.texto1;
var posi_texto1_x=data.posi_texto1_x;
var posi_texto1_y=data.posi_texto1_y;
var ancho_texto1=data.ancho_texto1;
var alto_texto1=data.alto_texto1;
var font_size_texto1=data.font_size_texto1;

var iddocumento2=data.iddocumento2;
var maquina=data.elordenador;
var elparticipante=data.elparticipante;
var ruta=data.ruta;
var archivopdf=data.archivopdf;
var archivopdf2="";
var filename="";

      alert("se asigno las variables");

// Generando el certificado
	
  	var formData = new FormData();
	var participante=elparticipante;
	var modelo=archivopdf;
	var archivo=archivopdf2;
alert(ruta);	
	formData.append("asunto", asunto);
	formData.append("participante", participante);
    	formData.append("modelo", modelo);
    	formData.append("maquina", maquina);
    	formData.append("ruta", ruta);
    	formData.append("archivo", archivo);

    	formData.append("ancho_x", ancho_x);
    	formData.append("alto_y", alto_y);

    	formData.append("posi_nomb_x", posi_nomb_x);
    	formData.append("posi_nomb_y", posi_nomb_y);
    	formData.append("size_nombre", size_nombre);

    	formData.append("posi_codigo_x", posi_codigo_x);
    	formData.append("posi_codigo_y", posi_codigo_y);

    	formData.append("posi_fecha_x", posi_fecha_x);
    	formData.append("posi_fecha_y", posi_fecha_y);

    	formData.append("firma1_x", firma1_x);
    	formData.append("firma1_y", firma1_y);

    	formData.append("firma2_x", firma2_x);
    	formData.append("firma2_y", firma2_y);

    	formData.append("firma3_x", firma3_x);
    	formData.append("firma3_y", firma3_y);


	
    	formData.append("texto1", texto1);
    	formData.append("posi_texto1_x", posi_texto1_x);
    	formData.append("posi_texto1_y", posi_texto1_y);
    	formData.append("ancho_texto1", ancho_texto1);
    	formData.append("alto_texto1", alto_texto1);
    	formData.append("font_size_texto1", font_size_texto1);

    	formData.append("fecha", fechaelaboracion);
	
	url= "https://"+maquina+"/FPDI/certificado.php";
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST",url,false);
    	xhttp.send(formData);
	xhttp.onreadystatechange = function(){

 		if(xhttp.readyState === XMLHttpRequest.DONE) {
    			var status = xhttp.status;
    			if (status === 0 || (status >= 200 && status < 400)) {
      				// The request has been completed successfully
				var response = xhttp.responseText;
          			alert(response + "archivo cargado");
			//	history.back(); //Go to the previous page
       			}else{
				alert("No se pudo cargar el archivo"+status);
			}
			}else{ alert("que paso chico");}
              	};
	}
	},
      error: function (xhr, ajaxOptions, thrownError){ 
        alert(xhr.status);
        alert(thrownError);
      }

    })




}




</script>



