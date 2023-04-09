<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estadoasignaturadocente))
{
?>
        <li> <?php echo anchor('estadoasignaturadocente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estadoasignaturadocente/siguiente/'.$estadoasignaturadocente['idestadoasignaturadocente'], 'siguiente'); ?></li>
        <li> <?php echo anchor('estadoasignaturadocente/anterior/'.$estadoasignaturadocente['idestadoasignaturadocente'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estadoasignaturadocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estadoasignaturadocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estadoasignaturadocente/edit/'.$estadoasignaturadocente['idestadoasignaturadocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estadoasignaturadocente/delete/'.$estadoasignaturadocente['idestadoasignaturadocente'],'Delete'); ?></li>
        <li> <?php echo anchor('estadoasignaturadocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadoasignaturadocente/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('estadoasignaturadocente/save_edit') ?>
<?php echo form_hidden('idestadoasignaturadocente',$estadoasignaturadocente['idestadoasignaturadocente']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idestadoasignaturadocente',$estadoasignaturadocente['idestadoasignaturadocente'],array("disabled"=>"disabled",'placeholder'=>'Idestadoasignaturadocentes'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$estadoasignaturadocente['nombre'],array('placeholder'=>'Nombre del estadoasignaturadocente')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



