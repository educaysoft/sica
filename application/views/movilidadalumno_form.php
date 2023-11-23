<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("movilidadalumno/save") ?>
<?php echo form_hidden("idmovilidadalumno")  ?>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->cedula." - ". $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Desde:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($departamentofuente as $row){
	$options[$row->iddepartamentofuente]= $row->eldepartamento;
}

 echo form_dropdown("iddepartamentofuente",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hasta:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($departamentodestino as $row){
	$options[$row->iddepartamentodestino]= $row->eldepartamento;
}

 echo form_dropdown("iddepartamentodestino",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hasta:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($tipomovilidadalumno as $row){
	$options[$row->idtipomovilidadalumno]= $row->nombre;
}

 echo form_dropdown("idtipomovilidadalumno",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>







<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("movilidadalumno","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

