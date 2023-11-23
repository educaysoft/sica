<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipomovilidadalumno))
{
?>
        <li> <?php echo anchor('tipomovilidadalumno/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipomovilidadalumno/siguiente/'.$tipomovilidadalumno['idtipomovilidadalumno'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipomovilidadalumno/anterior/'.$tipomovilidadalumno['idtipomovilidadalumno'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipomovilidadalumno/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipomovilidadalumno/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipomovilidadalumno/edit/'.$tipomovilidadalumno['idtipomovilidadalumno'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipomovilidadalumno/delete/'.$tipomovilidadalumno['idtipomovilidadalumno'],'Delete'); ?></li>
        <li> <?php echo anchor('tipomovilidadalumno/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipomovilidadalumno/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipomovilidadalumno/save_edit') ?>
<?php echo form_hidden('idtipomovilidadalumno',$tipomovilidadalumno['idtipomovilidadalumno']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipomovilidadalumno',$tipomovilidadalumno['idtipomovilidadalumno'],array("disabled"=>"disabled",'placeholder'=>'Idtipomovilidadalumnos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipomovilidadalumno['nombre'],array('placeholder'=>'Nombre del tipomovilidadalumno')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



