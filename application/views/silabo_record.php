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
        <li> <?php echo anchor('silabo/panel/','Panel'); ?></li>

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
	      $options[$row->idasignatura]= $row->nombre;
    }
    echo form_input('idasignatura',$options[$silabo['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/add', 'Documentos:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($documentosilabos as $row){
		$options[$row->iddocumento]=$row->asunto;
	}
	?>
	<div class="col-md-10">
		<?php
 			echo form_multiselect('iddocumento[]',$options,(array)set_value('iddocumento',''), array('style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidades del silabo: ( <?php echo anchor('unidadsilabo/add/'.$silabo['idsilabo'], 'New'); ?>):</label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idsilabo</th>
	 <th>idunidadsilabo</th>
	 <th>Unidad</th>
	 <th>nombre</th>
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




<?php echo form_close(); ?>



<script type="text/javascript">

$(document).ready(function(){
	var idsilabo=document.getElementById("idsilabo").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('silabo/unidadsilabo_data')?>', type: 'GET',data:{idsilabo:idsilabo}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idunidadsilabo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>
</body>
