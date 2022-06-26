<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($curso))
{
?>
        <li> <?php echo anchor('curso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('curso/siguiente/'.$curso['idcurso'], 'siguiente'); ?></li>
        <li> <?php echo anchor('curso/anterior/'.$curso['idcurso'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('curso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('curso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('curso/edit/'.$curso['idcurso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('curso/delete/'.$curso['idcurso'],'Delete'); ?></li>
        <li> <?php echo anchor('curso/listar/','Listar'); ?></li>
        <li> <?php echo anchor('cursounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('curso/panel/','Panel'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('curso/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('curso/save_edit') ?>
<?php echo form_hidden('idcurso',$curso['idcurso']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idcurso',$curso['idcurso'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
       echo form_input('nombre',$curso['nombre'],array('placeholder'=>'Nombre del curso','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
		<?php
       echo form_input('descripcion',$curso['descripcion'],array('placeholder'=>'Descripción del curso','style'=>'width:500px;'));
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> duración:</label>
	<div class="col-md-10">
		<?php
       		echo form_input('duracion',$curso['duracion'],array('placeholder'=>'Duracion en horas','style'=>'width:500px;'));
		?>
	</div> 
</div>  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/add', 'Documentos:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($documentos as $row){
		$options[$row->iddocumento]=$row->asunto;
	}
	?>
	<div class="col-md-10">
		<?php
 			echo form_multiselect('iddocumento[]',$options,(array)set_value('iddocumento',''), array('style'=>'width:500px;')); 
		?>
	</div> 
</div>


<?php echo form_close(); ?>



