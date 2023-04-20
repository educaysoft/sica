<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($correo_estado))
{
?>
        <li> <?php echo anchor('correo_estado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('correo_estado/siguiente/'.$correo_estado['idcorreo_estado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('correo_estado/anterior/'.$correo_estado['idcorreo_estado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('correo_estado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('correo_estado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('correo_estado/edit/'.$correo_estado['idcorreo_estado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('correo_estado/delete/'.$correo_estado['idcorreo_estado'],'Delete'); ?></li>
        <li> <?php echo anchor('correo_estado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('correo_estado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('correo_estado/save_edit') ?>
<?php echo form_hidden('idcorreo_estado',$correo_estado['idcorreo_estado']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idcorreo_estado',$correo_estado['idcorreo_estado'],array("disabled"=>"disabled",'placeholder'=>'Idcorreo_estados'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$correo_estado['nombre'],array('placeholder'=>'Nombre del correo_estado')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



