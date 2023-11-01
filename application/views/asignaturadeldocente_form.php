<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignaturadeldocente/save") ?>
<?php echo form_hidden("idasignaturadeldocente")  ?>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->idasignatura.' - '.$row->area.' - '.$row->nivel.' - '.$row->nombre;
}
 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  ?></td>
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente:</label>
	<div class="col-md-10">
	<?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}
 echo form_dropdown("iddocente",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Documento:</label>
	<div class="col-md-10">
	<?php


$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->iddocumento." - ".$row->asunto;
}
 echo form_dropdown("iddocumento",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de desde:</label>
	<div class="col-md-10">
	<?php
 echo form_input(array("name"=>"fechadesde","id"=>"fechadesde","type"=>"date"));  
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta:</label>
	<div class="col-md-10">
	<?php
 echo form_input(array("name"=>"fechahasta","id"=>"fechahasta","type"=>"date"));  
		?>
	</div> 
</div> 











<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignaturadeldocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

