<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($evento_estado))
{
?>
        <li> <?php echo anchor('evento_estado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evento_estado/siguiente/'.$evento_estado['idevento_estado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('evento_estado/anterior/'.$evento_estado['idevento_estado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evento_estado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evento_estado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evento_estado/edit/'.$evento_estado['idevento_estado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evento_estado/delete/'.$evento_estado['idevento_estado'],'Delete'); ?></li>
        <li> <?php echo anchor('evento_estado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('evento_estado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('evento_estado/save_edit') ?>
<?php echo form_hidden('idevento_estado',$evento_estado['idevento_estado']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idevento_estado',$evento_estado['idevento_estado'],array("disabled"=>"disabled",'placeholder'=>'Idevento_estados'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$evento_estado['nombre'],array('placeholder'=>'Nombre del evento_estado')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



