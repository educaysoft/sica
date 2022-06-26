<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($periodoacademio))
{
?>
        <li> <?php echo anchor('periodoacademio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('periodoacademio/siguiente/'.$periodoacademio['idperiodoacademio'], 'siguiente'); ?></li>
        <li> <?php echo anchor('periodoacademio/anterior/'.$periodoacademio['idperiodoacademio'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('periodoacademio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('periodoacademio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('periodoacademio/edit/'.$periodoacademio['idperiodoacademio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('periodoacademio/delete/'.$periodoacademio['idperiodoacademio'],'Delete'); ?></li>
        <li> <?php echo anchor('periodoacademio/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('periodoacademio/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('periodoacademio/save_edit') ?>
<?php echo form_hidden('idperiodoacademio',$periodoacademio['idperiodoacademio']) ?>

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
      echo form_input('idperiodoacademio',$periodoacademio['idperiodoacademio'],array("disabled"=>"disabled"));
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrecorto',$periodoacademio['nombrecorto'],array('placeholder'=>'Nombre corto del periodoacademio'));

	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrelargo',$periodoacademio['nombrelargo'],array('placeholder'=>'Nombre largo del periodoacademio'));
	?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechainicio',$periodoacademio['fechainicio'],array('placeholder'=>'Fecha en que inicia el periodoacademio')); 

?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha finaliza: </label>
	<div class="col-md-10">
     	<?php 
echo form_input('fechafin',$periodoacademio['fechafin'],array('placeholder'=>'Fecha en que finaliza el periodoacademio')); 
?>
	</div> 
</div>

   

<?php echo form_close(); ?>



