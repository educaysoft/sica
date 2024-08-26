<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estadoproceso))
{
?>
        <li> <?php echo anchor('estadoproceso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estadoproceso/siguiente/'.$estadoproceso['idestadoproceso'], 'siguiente'); ?></li>
        <li> <?php echo anchor('estadoproceso/anterior/'.$estadoproceso['idestadoproceso'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estadoproceso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estadoproceso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estadoproceso/edit/'.$estadoproceso['idestadoproceso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estadoproceso/delete/'.$estadoproceso['idestadoproceso'],'Delete'); ?></li>
        <li> <?php echo anchor('estadoproceso/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadoproceso/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('estadoproceso/save_edit') ?>
<?php echo form_hidden('idestadoproceso',$estadoproceso['idestadoproceso']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idestadoproceso',$estadoproceso['idestadoproceso'],array("disabled"=>"disabled",'placeholder'=>'Idestadoprocesos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$estadoproceso['nombre'],array('placeholder'=>'Nombre del estadoproceso')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



