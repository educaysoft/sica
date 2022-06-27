<style>

.modal.face .modal-dialog{
	transform: translate3d(0,100vh,0);
}

.modal.in .modal-dialog{
	transform: translate3d(0,0,0);
}





body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top:  0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>


<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Lista de portafoliodocentes 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>Idportafoliodocente</th>
 <th>El docente</th>
 <th>Documento</th>
 <th>Archivopdf</th>
 <th>Estado</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">





 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>






<!--- MODAL ADD ---->

<form>
	<div class="modal fade" id="Modal_Edit" tabindex="-1"  role="dialog" arias-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar notas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


<div class="form-group row">
	<label class="col-md-2 col-form-label">idportafoliodocente:</label>
		<div class="col-md-10">
			<?php
 	echo form_input(array("name"=>"idportafoliodocente","id"=>"idportafoliodocente","type"=>"text"));  
			?>
		</div>
	</div>




<div class="form-group row">
	<label class="col-md-2 col-form-label">Fecha:</label>
		<div class="col-md-10">
			<?php
 	echo form_input(array("name"=>"fechaelaboracion","id"=>"fechaelaboracion"));  
			?>
		</div>
	</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">De:</label>
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
<label class="col-md-2 col-form-label">Título:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto",'id'=>'asunto' );    
 echo form_textarea("asunto","", $textarea_options); 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Ordenador:</label>
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
<label class="col-md-2 col-form-label">TipoDocu:</label>
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
<label class="col-md-2 col-form-label">Archivo:</label>
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




								</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="submit" id="btn_update" class="btn btn-primary">Guardar</button>
				</div>
			</div>

		</div>
	</div>


</form>































<script type="text/javascript">

$(document).ready(function(){

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('portafoliodocente/portafoliodocente_data_estu')?>', type: 'GET'},});

});

//$('#show_data').on('click','.item_ver',function(){
//var id=$(this).data('idportafoliodocente');
//var retorno= $(this).data('retorno');
//window.location.href = retorno+'/'+id;
//});



$('#show_data').on('click','.item_ver',function(){

var ordenador = "https://"+$(this).data('ordenador');
var ubicacion=$(this).data('ubicacion');
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;


});










$('#show_data').on('click','.item_cargar',function(){


//	data_default_timezone_set('America/Guayaquil');
//	$dtz = new DateTimeZone('America/Guayaquil');
//	$fecha = new DateTime("now",$dtz);

	var year = new Date().toLocaleString('es-EC', {timeZone: "America/Guayaquil",year:"numeric"});
	var month = new Date().toLocaleString('es-EC', {timeZone: "America/Guayaquil",month: "2-digit"});
	var day = new Date().toLocaleString('es-EC', {timeZone: "America/Guayaquil",day:"2-digit"});
	var fecha=year+"-"+month+"-"+day;


	alert(fecha);
	$('#Modal_Edit').modal('show');
	$('[name="fechaelaboracion"]').val(fecha);

	$('[name="idportafoliodocente"]').val($(this).data('idportafoliodocente'));
	$('[name="asunto"]').val($(this).data('eldocumento')+" de "+$(this).data('eldocente'));
	var idpersona=$(this).data('idpersona');
	  $('#idpersona option[value="'+idpersona+'"]').attr('selected','selected');
	var idordenador=8;
	  $('#idordenador option[value="'+idordenador+'"]').attr('selected','selected');
	var idtipodocu=17;
	  $('#idtipodocu option[value="'+idtipodocu+'"]').attr('selected','selected');

});






//=====================
//
// Upload file
//====================			
function uploadFiles(url1) {

  var totalfiles = document.getElementById('files').files.length;
  var formData = new FormData();
  alert("Este proceso guardará todas los datos ingresados");	
  if(totalfiles > 0 ){

    var iddocumento2 = 0;
    var iddocumento = 0;
    var idportafoliodocente = document.getElementById('idportafoliodocente').value;
    var idtipodocu = document.getElementById('idtipodocu').value;
    var asunto =  document.getElementById('asunto').value;
    var fechaelaboracion = document.getElementById('fechaelaboracion').value;
    var idordenador =  document.getElementById('idordenador').value;
    var iddirectorio = document.getElementById('iddirectorio').value;
    var idddocumento_estado = 1;
    var idpersona = document.getElementById('idpersona').value;



    formData.append("iddocumento", 0);
    formData.append("idportafoliodocente", idportafoliodocente);
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
		iddocumento2=result_array.iddocumento;
		iddocumento=result_array.iddocumento;
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
    		// Send request with data
    		xhttp.send(formData);

    		// call on request changes state
    		xhttp.onreadystatechange = function() {
 		if(xhttp.readyState === XMLHttpRequest.DONE) {
    			var status = xhttp.status;
    			if (status === 0 || (status >= 200 && status < 400)) {
      				// The request has been completed successfully
				var response = xhttp.responseText;
          			alert(response + "archivo cargado");



	if(iddocumento2>0)
	{
		alert("asisnado el documento a portafolio del docente");
	  $.ajax({
        	url: "<?php echo site_url('portafoliodocente/save_edit2') ?>",
		data: {idportafoliodocente:idportafoliodocente,iddocumento:iddocumento},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){

//				var maquina1 = "https://"+maquina;

//				if(maquina1.slice(-1) != "/" && ruta.slice(0,1) != "/"){
//					ruta = maquina1+"/"+ruta;
//				}else{
//					ruta = maquina1+ruta;
//				}
//				var archivo = archivopdf2;
//				var certi= ruta.trim()+archivo.trim();
//				window.location.href = certi;

		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }

	    })
	}

				history.back(); //Go to the previous page
       			}else{
				alert("No se pudo cargar el archivo");
			}
			}
              	};
	}else{
		 alert("intento de guardar fallado");
	}
	};
  }else{
    alert("Porfavor seleccione un archivo");
  }

}







//================================================================
//
// Conseguir el directorio donde se guardará el archivo pdf
//
//================================================================


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







</script>

