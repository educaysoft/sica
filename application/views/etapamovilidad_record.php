<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($etapamovilidad))
{
?>
        <li> <?php echo anchor('etapamovilidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('etapamovilidad/siguiente/'.$etapamovilidad['idetapamovilidad'], 'siguiente'); ?></li>
        <li> <?php echo anchor('etapamovilidad/anterior/'.$etapamovilidad['idetapamovilidad'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('etapamovilidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('etapamovilidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('etapamovilidad/edit/'.$etapamovilidad['idetapamovilidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('etapamovilidad/delete/'.$etapamovilidad['idetapamovilidad'],'Delete'); ?></li>
        <li> <?php echo anchor('etapamovilidad/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('etapamovilidad/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('etapamovilidad/save_edit') ?>
<?php echo form_hidden('idetapamovilidad',$etapamovilidad['idetapamovilidad']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idetapamovilidad',$etapamovilidad['idetapamovilidad'],array("disabled"=>"disabled",'placeholder'=>'Idetapamovilidads'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$etapamovilidad['nombre'],array('placeholder'=>'Nombre del etapamovilidad')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



