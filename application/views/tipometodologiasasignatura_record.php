<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipometodologiasasignatura))
{
?>
        <li> <?php echo anchor('tipometodologiasasignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipometodologiasasignatura/siguiente/'.$tipometodologiasasignatura['idtipometodologiasasignatura'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipometodologiasasignatura/anterior/'.$tipometodologiasasignatura['idtipometodologiasasignatura'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipometodologiasasignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipometodologiasasignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipometodologiasasignatura/edit/'.$tipometodologiasasignatura['idtipometodologiasasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipometodologiasasignatura/delete/'.$tipometodologiasasignatura['idtipometodologiasasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('tipometodologiasasignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipometodologiasasignatura/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipometodologiasasignatura/save_edit') ?>
<?php echo form_hidden('idtipometodologiasasignatura',$tipometodologiasasignatura['idtipometodologiasasignatura']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipometodologiasasignatura',$tipometodologiasasignatura['idtipometodologiasasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idtipometodologiasasignaturas'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipometodologiasasignatura['nombre'],array('placeholder'=>'Nombre del tipometodologiasasignatura')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



