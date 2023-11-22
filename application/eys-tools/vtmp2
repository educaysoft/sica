<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("funcionario/save") ?>
<?php echo form_hidden("idfuncionario")  ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Departamento:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Cargo:</label>
	<div class="col-md-10">
	<?php
$options= array('--Select--');
foreach ($cargos as $row){
	$options[$row->idcargo]= $row->nombre;
}
 echo form_dropdown("idcargo",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de ingreso:</label>
	<div class="col-md-10">
	<?php
 echo form_input(array("name"=>"fechaingreso","id"=>"fechaingreso","type"=>"date"));  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de salida:</label>
	<div class="col-md-10">
	<?php
 echo form_input(array("name"=>"fechasalida","id"=>"fechasalida","type"=>"date"));  
		?>
	</div> 
</div>


<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("funcionario","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

