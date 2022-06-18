<style>
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
                 <h3>Lista de portafolioestudiantes 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>Idportafolioestudiante</th>
 <th>El estudiante</th>
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

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('portafolioestudiante/portafolioestudiante_data_estu')?>', type: 'GET'},});

});

$('#show_data').on('click','.item_ver',function(){
var id=$(this).data('idportafolioestudiante');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_cargar',function(){

$('#Modal_Edit').modal('show');

});





//=====================
//
// Upload file
//====================			
//function uploadFiles(url1) 
function uploadFiles() 

 var url1=<?php echo base_url(); ?>+"index.php/documento/save";
  var totalfiles = document.getElementById('files').files.length;
  var formData = new FormData();
  alert("Este proceso guardará todas los datos ingresados");	
  if(totalfiles > 0 ){

    var iddocumento = 0;
    var idtipodocu = 16;  //PORTAFOLIO document.getElementById('idtipodocu').value;
    var asunto = $(this).data('eldocumento')." de ". $(this).data('elestudiante'); // document.getElementById('asunto').value;
    var fechaelaboracion = date();  // document.getElementById('fechaelaboracion').value;
    var idordenador = 8; // document.getElementById('idordenador').value;
    var iddirectorio =4; // document.getElementById('iddirectorio').value;
    var idddocumento_estado = 2;
    var idpersona = $(this).data('idpersona'); // document.getElementById('idpersona').value;


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
    			if (status === 0 || (status >= 200 && status < 400)) {
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








</script>

