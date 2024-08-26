<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estadoactividad))
{
?>
        <li> <?php echo anchor('estadoactividad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estadoactividad/siguiente/'.$estadoactividad['idestadoactividad'], 'siguiente'); ?></li>
        <li> <?php echo anchor('estadoactividad/anterior/'.$estadoactividad['idestadoactividad'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estadoactividad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estadoactividad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estadoactividad/edit/'.$estadoactividad['idestadoactividad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estadoactividad/delete/'.$estadoactividad['idestadoactividad'],'Delete'); ?></li>
        <li> <?php echo anchor('estadoactividad/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadoactividad/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('estadoactividad/save_edit') ?>
<?php echo form_hidden('idestadoactividad',$estadoactividad['idestadoactividad']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idestadoactividad',$estadoactividad['idestadoactividad'],array("disabled"=>"disabled",'placeholder'=>'Idestadoactividads'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$estadoactividad['nombre'],array('placeholder'=>'Nombre del estadoactividad')); 

	?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Color:</label>
	<div class="col-md-10">
     <?php
       echo form_input('color',$estadoactividad['color'],array('placeholder'=>'color del estadoactividad')); 

	?>
	</div> 
</div>



   
<?php echo form_close(); ?>



