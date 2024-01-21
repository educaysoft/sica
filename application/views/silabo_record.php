<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($silabo))
{
?>
        <li> <?php echo anchor('silabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('silabo/siguiente/'.$silabo['idsilabo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('silabo/anterior/'.$silabo['idsilabo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('silabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('silabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('silabo/edit/'.$silabo['idsilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('silabo/delete/'.$silabo['idsilabo'],'Delete'); ?></li>
        <li> <?php echo anchor('silabo/listar/','Listar'); ?></li>
        <li> <?php echo anchor('silabounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('silabo/reportepdf/'.$silabo['idsilabo'],'Reportepdf'); ?></li>
        <li> <?php echo anchor('silabo/exportcsv/'.$silabo['idsilabo'],'ExportarCSV'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('silabo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('silabo/save_edit') ?>
<?php echo form_hidden('idsilabo',$silabo['idsilabo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idsilabo',$silabo['idsilabo'],array("id"=>"idsilabo","disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
       echo form_input('nombre',$silabo['nombre'],array('placeholder'=>'Nombre del silabo','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
		<?php
       echo form_input('descripcion',$silabo['descripcion'],array('placeholder'=>'Descripción del silabo','style'=>'width:500px;'));
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> duración:</label>
	<div class="col-md-10">
		<?php
       		echo form_input('duracion',$silabo['duracion'],array('placeholder'=>'Duracion en horas','style'=>'width:500px;'));		?>
	</div> 
</div>  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura: ( <?php echo anchor('asignatura/actual/'.$silabo['idasignatura'], 'Ver'); ?>):</label>

	<div class="col-md-10">
     <td><?php 
    $options= array("NADA");
    foreach ($asignaturas as $row){
	      $options[$row->idasignatura]=$row->area." - ". $row->nombre;
    }
    echo form_input('idasignatura',$options[$silabo['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo: ( <?php echo anchor('periodoacademico/actual/'.$silabo['idperiodoacademico'], 'Ver'); ?>):</label>

	<div class="col-md-10">
     <td><?php 
    $options= array("NADA");
    foreach ($periodoacademicos as $row){
	      $options[$row->idperiodoacademico]= $row->nombrecorto;
    }
    echo form_input('idperiodoacademico',$options[$silabo['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente: ( <?php echo anchor('docente/actual/'.$silabo['iddocente'], 'Ver'); ?>):</label>

	<div class="col-md-10">
     <td><?php 
    $options= array("NADA");
    foreach ($docentes as $row){
	      $options[$row->iddocente]= $row->eldocente;
    }
    echo form_input('iddocente',$options[$silabo['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Documento:</label>
	<div class="col-md-10">
     <?php 
   // print_r($silabo);
//die();


    
    
    $options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$silabo['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor($silabo['linkdetalle'], 'Documentos:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($documentosilabos as $row){
		$options[$row->iddocumentosilabo]=$row->eldocumento;
	}
	?>
	<div class="col-md-10">
		<?php

 echo form_multiselect('documentosilabo[]',$options,(array)set_value('iddocumento', ''), array('style'=>'width:500px','name'=>'iddocumentosilabo','id'=>'iddocumentosilabo','onChange'=>'mostrardocu()')); 
		?>
	</div> 
</div>



<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Unidades : ( <?php echo anchor('unidadsilabo/add/'.$silabo['idsilabo'], 'New'); ?>):  </b>
        </div>
        
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idsilabo</th>
	 <th>idunidadsilabo</th>
	 <th>Unidad</th>
	 <th>nombre</th>
	 <th>sesiones</th>
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




<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
	<div class="pull-left"> 
	 <b>Eventos dictados: ( <?php echo anchor('evento/add', 'New'); ?>):</b>
        </div>
        
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idsilabo</th>
	 <th>idevento</th>
	 <th>evento</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data1">
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
	var idsilabo=document.getElementById("idsilabo").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('silabo/unidadsilabo_data')?>', type: 'GET',data:{idsilabo:idsilabo}},});


	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('silabo/evento_data')?>', type: 'GET',data:{idsilabo:idsilabo}},});

});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idunidadsilabo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});



$('#show_data1').on('click','.item_ver',function(){
var id= $(this).data('idevento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

function mostrarsilabo()
{

	var options = document.getElementById('linkdetalle').value;
	window.location.href = options;



}





</script>
</body>
