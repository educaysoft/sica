<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tiempodedicacion))
{
?>
        <li> <?php echo anchor('tiempodedicacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tiempodedicacion/siguiente/'.$tiempodedicacion['idtiempodedicacion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tiempodedicacion/anterior/'.$tiempodedicacion['idtiempodedicacion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tiempodedicacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tiempodedicacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tiempodedicacion/edit/'.$tiempodedicacion['idtiempodedicacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tiempodedicacion/delete/'.$tiempodedicacion['idtiempodedicacion'],'Delete'); ?></li>
        <li> <?php echo anchor('tiempodedicacion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tiempodedicacion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tiempodedicacion/save_edit') ?>
<?php echo form_hidden('idtiempodedicacion',$tiempodedicacion['idtiempodedicacion']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtiempodedicacion',$tiempodedicacion['idtiempodedicacion'],array("disabled"=>"disabled",'placeholder'=>'Idtiempodedicacions'));
	?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tiempodedicacion['nombre'],array('placeholder'=>'Nombre del tiempodedicacion')); 

	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Inicial:</label>
	<div class="col-md-10">
     <?php
       echo form_input('inicial',$tiempodedicacion['inicial'],array('placeholder'=>'inicial del tiempodedicacion')); 

	?>
	</div> 
</div>


   
<?php echo form_close(); ?>



