<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipohorasasignatura))
{
?>
        <li> <?php echo anchor('tipohorasasignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipohorasasignatura/siguiente/'.$tipohorasasignatura['idtipohorasasignatura'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipohorasasignatura/anterior/'.$tipohorasasignatura['idtipohorasasignatura'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipohorasasignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipohorasasignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipohorasasignatura/edit/'.$tipohorasasignatura['idtipohorasasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipohorasasignatura/delete/'.$tipohorasasignatura['idtipohorasasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('tipohorasasignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipohorasasignatura/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipohorasasignatura/save_edit') ?>
<?php echo form_hidden('idtipohorasasignatura',$tipohorasasignatura['idtipohorasasignatura']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipohorasasignatura',$tipohorasasignatura['idtipohorasasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idtipohorasasignaturas'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipohorasasignatura['nombre'],array('placeholder'=>'Nombre del tipohorasasignatura')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



