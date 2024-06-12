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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-center">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">
<div class="row" style="background-color:blue; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b style="color:white">
                <i class="fas fa-file-alt fa-2x"></i> <!-- Icono del documento -->
                Documentos del portafolio:
            </b>
        </div>
    </div>
</div>


	<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Periodo:</label>
	<?php
		$options= array('--Select--');
		foreach ($periodoacademicos as $row){
			$options[$row->idperiodoacademico]= $row->nombrecorto;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idperiodoacademico",$options, set_select('--Select--','default_value'),array('onchange'=>'filtra_periodo()'));  
		?>
	</div>
	</div>



	<table class="table table-striped table-bordered table-hover" id="mydatap">
	 <thead>
	 <tr>
	 <th>Id document</th>
	 <th>Tipo document</th>
	 <th>Título asunto</th>
	 <th>Nombre archvo.</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datap">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>














<div class="form-group row">
	<div class="col-md-10">
<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12" style="border:solid">


<div class="row" style="background-color:#90EE90; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
 
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
	     <b >Lista de eventos activos dictados por:  <?php echo $persona[0]->apellidos; ?> <?php echo "  "; ?>  <?php echo $persona[0]->nombres; ?>    	</b>
        </div>
        
    </div>
</div>




<div id="filtro" style="display:none"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>ID</th>
 <th>Evento - Curso</th>
 <th>Inicio</th>
 <th>Fin</th>
 <th>Tutor</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">


 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>





<div class="form-group row">
	<div class="col-md-10">
<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12" style="border:solid">
<div class="row" style="background-color:yellow; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
	     <b>Lista de eventos recibios por:  <?php echo $persona[0]->apellidos; ?> <?php echo "  "; ?>  <?php echo $persona[0]->nombres; ?>    	</b>
        </div>
        
    </div>
</div>

<div id="filtro" style="display:none"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatac_e">
 <thead>
 <tr>
 <th>ID</th>
 <th>Evento - Curso</th>
 <th>Inicio</th>
 <th>Fin</th>
 <th>Tutor</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data_e">

 </tbody>
</table>
</div>
</div>
</div>
</div>
</div>







<div class="form-group row">
	<div class="col-md-10">
<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12" style="border:solid">
<div class="row" style="background-color:red; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left" >
	     <b style="color:white">Eventos recibidos y ditados ya terminados  :  <?php echo $persona[0]->apellidos; ?> <?php echo "  "; ?>  <?php echo $persona[0]->nombres; ?>    	</b>
        </div>
        
    </div>
</div>

<div id="filtro" style="display:none"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatac_t">
 <thead>
 <tr>
 <th>ID</th>
 <th>Evento - Curso</th>
 <th>Inicio</th>
 <th>Fin</th>
 <th>Tutor</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data_t">

 </tbody>
</table>
</div>
</div>
</div>
</div>
</div>












<script type="text/javascript">

$(document).ready(function(){
	var idpersona = document.getElementById("filtro").innerHTML;
	var idportafolio=0;
	var idperiodoacademico=0;
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/persona_data')?>', type: 'GET',data:{idpersona:idpersona}},});
	var mytabla_e= $('#mydatac_e').DataTable({"ajax": {url: '<?php echo site_url('evento/persona_data_e')?>', type: 'GET',data:{idpersona:idpersona}},});
	var mytabla_e= $('#mydatac_t').DataTable({"ajax": {url: '<?php echo site_url('evento/persona_data_t')?>', type: 'GET',data:{idpersona:idpersona}},});
	var mytablaf= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('portafolio/documento_data')?>', type: 'GET',data:{idpersona:idpersona,idperiodoacademico:idperiodoacademico}},});
});




$('#show_data').on('click','.item_ver',function(){

	var id= $(this).data('idevento');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;

});

$('#show_data_e').on('click','.item_ver',function(){

	var id= $(this).data('idevento');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;

});

$('#show_data_t').on('click','.item_ver3',function(){
	var id= $(this).data('idevento3');
	var retorno= $(this).data('retorno3');
	window.location.href = retorno+'/'+id;

});







$('#show_data').on('click','.item_ver2',function(){

	var id= $(this).data('idevento2');
	var retorno= $(this).data('retorno2');
	window.location.href = retorno+'/'+id;

});




var idevento_estado=0;
function filtra_evento()
{
//       var idevento_estado = $('select[name=idevento_estado]').val();

	var idpersona = document.getElementById("filtro").innerHTML;
       
var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('evento/persona_data')?>', type: 'GET',data:{idpersona:idpersona}},});
}

var idperiodoacademico=0;
function filtra_periodo()
{
	var idpersona = document.getElementById("filtro").innerHTML;
	idperiodoacademico = $('select[name=idperiodoacademico]').val();
//	var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('documento/documento_dataxtipodocu')?>', type: 'GET',data:{idperiodoacaemico:idperiodoacademico}},});
	var mytablaf= $('#mydatap').DataTable({destroy:true,"ajax": {url: '<?php echo site_url('portafolio/documento_data')?>', type: 'GET',data:{idpersona:idpersona,idperiodoacademico:idperiodoacademico}},});
}


$('#show_datap').on('click','.docu_ver',function(){

var ordenador = "https://"+$(this).data('ordenador');
var ubicacion = $(this).data('ubicacion');
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;

});





</script>

