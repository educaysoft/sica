<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($docente))
{
?>
        <li> <?php echo anchor('docente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('docente/anterior/'.$docente['iddocente'], 'anterior'); ?></li>
        <li> <?php echo anchor('docente/siguiente/'.$docente['iddocente'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('docente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('docente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('docente/edit/'.$docente['iddocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('docente/delete/'.$docente['iddocente'],'Delete'); ?></li>
        <li> <?php echo anchor('docente/listar/','Listar'); ?></li>
        <li> <?php echo anchor('docente/reportepdf/'.$docente['idpersona'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('docente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('docente/save_edit') ?>
<?php echo form_hidden('iddocente',$docente['iddocente']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">id persona: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idpersona',$docente['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Iddocentes','style'=>'width:600px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">id Docente: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('iddocente',$docente['iddocente'],array("id"=>"iddocente","disabled"=>"disabled",'placeholder'=>'Iddocentes','style'=>'width:600px;')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$docente['idpersona']],array("disabled"=>"disabled",'style'=>'width:600px;'));
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> Depart-Carrera: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$docente['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:600px;'));
		?>
	</div> 
</div>

  



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Estudios realizados: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('estudio/add/'.$docente['idpersona']) ?>">Nueva estudio</a><a class="btn btn-danger" href="<?php echo base_url('docente/reportepdf/'.$docente['idpersona']) ?>">Reporte</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idpersona</th>
	 <th>idestudio</th>
	 <th>intitucion</th>
	 <th>nivel</th>
	 <th>titulo</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datae">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>




<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Publicaciones del docente: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('publicacion/add/') ?>">Nueva publicacion</a><a class="btn btn-danger" href="<?php echo base_url('publicaciondocente/add/'.$docente['iddocente']) ?>">Nueva publicación docente</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatap">
	 <thead>

<tr>
 <th>ID</th>
 <th>Docente</th>
 <th>titulo</th>
 <th>tipo</th>
 <th>url</th>
 <th>fecha</th>
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
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Asignaturas del docente: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('asignaturadeldocente/add/') ?>">Nueva asignatura</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydataa">
	 <thead>
<tr>
 <th>ID</th>
 <th>Docente</th>
 <th>Asignatura</th>
 <th>Evidencia</th>
 <th style="text-align: right;">Actions</th>
 </tr>



	 </thead>
	 <tbody id="show_dataa">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>









<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
	    <div class="col-lg-12 margin-tb">
		<div class="pull-left">
		    <b>Participación en distributivo: </b>
		</div>
	    </div>
	</div>

	<table class="table table-striped table-bordered table-hover" id="mydatad">
	 <thead>
	 <tr>
	 <th>iddocente</th>
	 <th>iddistributivo</th>
	 <th>iddistdoce</th>
	 <th>perido</th>
	 <th>Departamento</th>
	 <th>numeasig</th>
	 <th>horas</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datad">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>





<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var iddocente=document.getElementById("iddocente").value;
	var idpersona=document.getElementById("idpersona").value;
	var mytablaf= $('#mydatad').DataTable({"ajax": {url: '<?php echo site_url('distributivo/docente2_data')?>', type: 'GET',data:{iddocente:iddocente}},});
	var mytabla= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('publicaciondocente/publicaciondocente_data')?>', type: 'GET',data:{iddocente:iddocente}},});
	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('docente/estudio_data')?>', type: 'GET',data:{idpersona:idpersona}},});
	var mytabla= $('#mydataa').DataTable({"ajax": {url: '<?php echo site_url('asignaturadeldocente/asignaturadeldocente_data')?>', type: 'GET',data:{iddocente:iddocente}},});
});






$('#show_datae').on('click','.item_vere',function(){
var id= $(this).data('idestudio');
var retorno= $(this).data('retornoe');
window.location.href = retorno+'/'+id;
});




$('#show_datad').on('click','.item_ver',function(){
var id= $(this).data('iddistributivodocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

$('#show_datap').on('click','.item_ver',function(){
var id= $(this).data('idpublicaciondocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

$('#show_dataa').on('click','.item_ver',function(){
var id= $(this).data('idasignaturadeldocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





</script>


</body>









</html>
