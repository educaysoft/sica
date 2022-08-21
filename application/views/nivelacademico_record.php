<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($nivelacademico))
{
?>
        <li> <?php echo anchor('nivelacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('nivelacademico/siguiente/'.$nivelacademico['idnivelacademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('nivelacademico/anterior/'.$nivelacademico['idnivelacademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('nivelacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('nivelacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('nivelacademico/edit/'.$nivelacademico['idnivelacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('nivelacademico/delete/'.$nivelacademico['idnivelacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('nivelacademico/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('nivelacademico/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('nivelacademico/save_edit') ?>
<?php echo form_hidden('idnivelacademico',$nivelacademico['idnivelacademico']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idnivelacademico',$nivelacademico['idnivelacademico'],array("disabled"=>"disabled",'placeholder'=>'Idnivelacademicos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$nivelacademico['nombre'],array('placeholder'=>'Nombre del nivelacademico')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



