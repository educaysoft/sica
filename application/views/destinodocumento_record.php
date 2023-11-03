<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($destinodocumento))
{
?>
        <li> <?php echo anchor('destinodocumento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('destinodocumento/siguiente/'.$destinodocumento['iddestinodocumento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('destinodocumento/anterior/'.$destinodocumento['iddestinodocumento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('destinodocumento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('destinodocumento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('destinodocumento/edit/'.$destinodocumento['iddestinodocumento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('destinodocumento/delete/'.$destinodocumento['iddestinodocumento'],'Delete'); ?></li>
        <li> <?php echo anchor('destinodocumento/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('destinodocumento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('destinodocumento/save_edit') ?>
<?php echo form_hidden('iddestinodocumento',$destinodocumento['iddestinodocumento']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('iddestinodocumento',$destinodocumento['iddestinodocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddestinodocumentos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$destinodocumento['nombre'],array('placeholder'=>'Nombre del destinodocumento')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



