<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($indicadoracademico))
{
?>
        <li> <?php echo anchor('indicadoracademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('indicadoracademico/siguiente/'.$indicadoracademico['idindicadoracademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('indicadoracademico/anterior/'.$indicadoracademico['idindicadoracademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('indicadoracademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('indicadoracademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('indicadoracademico/edit/'.$indicadoracademico['idindicadoracademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('indicadoracademico/delete/'.$indicadoracademico['idindicadoracademico'],'Delete'); ?></li>
        <li> <?php echo anchor('indicadoracademico/listar/','Listar'); ?></li>
        <li> <?php echo anchor('indicadoracademico/indicador1pdf/distributivo','Inticador1'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('indicadoracademico/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('indicadoracademico/save_edit') ?>
<?php echo form_hidden('idindicadoracademico',$indicadoracademico['idindicadoracademico']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idindicadoracademico',$indicadoracademico['idindicadoracademico'],array("disabled"=>"disabled",'placeholder'=>'Idindicadoracademicos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$indicadoracademico['nombre'],array('placeholder'=>'Nombre del indicadoracademico')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



