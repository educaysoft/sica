<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($periodoacademico))
{
?>
        <li> <?php echo anchor('periodoacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('periodoacademico/siguiente/'.$periodoacademico['idperiodoacademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('periodoacademico/anterior/'.$periodoacademico['idperiodoacademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('periodoacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('periodoacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('periodoacademico/edit/'.$periodoacademico['idperiodoacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('periodoacademico/delete/'.$periodoacademico['idperiodoacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('periodoacademico/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('periodoacademico/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('periodoacademico/save_edit') ?>
<?php echo form_hidden('idperiodoacademico',$periodoacademico['idperiodoacademico']) ?>

<div class="form-group row">
<label class="col-md-2 col-form-label"> Depart-Carrera: </label>
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php
echo form_input('iddepartamento',$options[$docente['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idperiodoacademico',$periodoacademico['idperiodoacademico'],array("disabled"=>"disabled"));
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrecorto',$periodoacademico['nombrecorto'],array('placeholder'=>'Nombre corto del periodoacademico'));

	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrelargo',$periodoacademico['nombrelargo'],array('placeholder'=>'Nombre largo del periodoacademico'));
	?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechainicio',$periodoacademico['fechainicio'],array('placeholder'=>'Fecha en que inicia el periodoacademico')); 

?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha finaliza: </label>
	<div class="col-md-10">
     	<?php 
echo form_input('fechafin',$periodoacademico['fechafin'],array('placeholder'=>'Fecha en que finaliza el periodoacademico')); 
?>
	</div> 
</div>

   

<?php echo form_close(); ?>



