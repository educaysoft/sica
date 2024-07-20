<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estadotrabajointegracioncurricular))
{
?>
        <li> <?php echo anchor('estadotrabajointegracioncurricular/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estadotrabajointegracioncurricular/siguiente/'.$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular'], 'siguiente'); ?></li>
        <li> <?php echo anchor('estadotrabajointegracioncurricular/anterior/'.$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estadotrabajointegracioncurricular/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estadotrabajointegracioncurricular/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estadotrabajointegracioncurricular/edit/'.$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estadotrabajointegracioncurricular/delete/'.$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular'],'Delete'); ?></li>
        <li> <?php echo anchor('estadotrabajointegracioncurricular/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadotrabajointegracioncurricular/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('estadotrabajointegracioncurricular/save_edit') ?>
<?php echo form_hidden('idestadotrabajointegracioncurricular',$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idestadotrabajointegracioncurricular',$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular'],array("disabled"=>"disabled",'placeholder'=>'Idestadotrabajointegracioncurriculars'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$estadotrabajointegracioncurricular['nombre'],array('placeholder'=>'Nombre del estadotrabajointegracioncurricular','style'=>'width:600px;')); 

	?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Color:</label>
	<div class="col-md-10">
     <?php
       echo form_input('color',$estadotrabajointegracioncurricular['color'],array('placeholder'=>'Color del estadotrabajointegracioncurricular')); 

	?>
	</div> 
</div>




   
<?php echo form_close(); ?>



