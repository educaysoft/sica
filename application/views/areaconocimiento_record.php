<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($areaconocimiento))
{
?>
        <li> <?php echo anchor('areaconocimiento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('areaconocimiento/siguiente/'.$areaconocimiento['idareaconocimiento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('areaconocimiento/anterior/'.$areaconocimiento['idareaconocimiento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('areaconocimiento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('areaconocimiento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('areaconocimiento/edit/'.$areaconocimiento['idareaconocimiento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('areaconocimiento/delete/'.$areaconocimiento['idareaconocimiento'],'Delete'); ?></li>
        <li> <?php echo anchor('areaconocimiento/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('areaconocimiento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('areaconocimiento/save_edit') ?>
<?php echo form_hidden('idareaconocimiento',$areaconocimiento['idareaconocimiento']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idareaconocimiento',$areaconocimiento['idareaconocimiento'],array("disabled"=>"disabled",'placeholder'=>'Idareaconocimientos'));
	?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$areaconocimiento['nombre'],array('placeholder'=>'Nombre del areaconocimiento')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



