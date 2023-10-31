<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tiporeferenciasasignatura))
{
?>
        <li> <?php echo anchor('tiporeferenciasasignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tiporeferenciasasignatura/siguiente/'.$tiporeferenciasasignatura['idtiporeferenciasasignatura'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tiporeferenciasasignatura/anterior/'.$tiporeferenciasasignatura['idtiporeferenciasasignatura'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tiporeferenciasasignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tiporeferenciasasignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tiporeferenciasasignatura/edit/'.$tiporeferenciasasignatura['idtiporeferenciasasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tiporeferenciasasignatura/delete/'.$tiporeferenciasasignatura['idtiporeferenciasasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('tiporeferenciasasignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tiporeferenciasasignatura/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tiporeferenciasasignatura/save_edit') ?>
<?php echo form_hidden('idtiporeferenciasasignatura',$tiporeferenciasasignatura['idtiporeferenciasasignatura']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtiporeferenciasasignatura',$tiporeferenciasasignatura['idtiporeferenciasasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idtiporeferenciasasignaturas'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tiporeferenciasasignatura['nombre'],array('placeholder'=>'Nombre del tiporeferenciasasignatura')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



