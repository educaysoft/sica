<!--Arhivo: modeevaluacion_record.php -->
<!--Modulo: modoevaluacion -->
<!--Descripción: vista que permite visualizar la información del modo de evaluacion -->
<!--Autor: Stalin Francis -->
<!--Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->

<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($modoevaluacion))
{
?>
        <li> <?php echo anchor('modoevaluacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('modoevaluacion/siguiente/'.$modoevaluacion['idmodoevaluacion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('modoevaluacion/anterior/'.$modoevaluacion['idmodoevaluacion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('modoevaluacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('modoevaluacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('modoevaluacion/edit/'.$modoevaluacion['idmodoevaluacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('modoevaluacion/delete/'.$modoevaluacion['idmodoevaluacion'],'Delete'); ?></li>
        <li> <?php echo anchor('modoevaluacion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('modoevaluacion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('modoevaluacion/save_edit') ?>
<?php echo form_hidden('idmodoevaluacion',$modoevaluacion['idmodoevaluacion']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idmodoevaluacion',$modoevaluacion['idmodoevaluacion'],array("disabled"=>"disabled",'placeholder'=>'Idmodoevaluacions'));
	?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$modoevaluacion['nombre'],array('placeholder'=>'Nombre del modoevaluacion')); 

	?>
	</div> 
</div> 
   
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ponderación:</label>
	<div class="col-md-10">
     <?php
       echo form_input('ponderacion',$modoevaluacion['ponderacion'],array('placeholder'=>'ponderación de la evaluacion')); 
	?>
	</div> 
</div>



<?php echo form_close(); ?>



