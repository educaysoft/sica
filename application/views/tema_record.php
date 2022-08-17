<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tema))
{
?>
        <li> <?php echo anchor('tema/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tema/siguiente/'.$tema['idtema'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tema/anterior/'.$tema['idtema'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tema/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tema/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tema/edit/'.$tema['idtema'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tema/delete/'.$tema['idtema'],'Delete'); ?></li>
        <li> <?php echo anchor('tema/listar/','Listar'); ?></li>
        <li> <?php echo anchor('temaunidad/','Unidades'); ?></li>
        <li> <?php echo anchor('tema/panel/','Panel'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tema/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tema/save_edit') ?>
<?php echo form_hidden('idtema',$tema['idtema']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idtema',$tema['idtema'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
       echo form_input('nombre',$tema['nombre'],array('placeholder'=>'Nombre del tema','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
		<?php
       echo form_input('descripcion',$tema['descripcion'],array('placeholder'=>'Descripción del tema','style'=>'width:500px;'));
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> duración:</label>
	<div class="col-md-10">
		<?php
       		echo form_input('duracion',$tema['duracion'],array('placeholder'=>'Duracion en horas','style'=>'width:500px;'));
		?>
	</div> 
</div>  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/add', 'Documentos:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($temadocumentos as $row){
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



