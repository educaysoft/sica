<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("evaluacion/save") ?>
<?php echo form_hidden("idevaluacion")  ?>
<table>


<tr>
<td> Persona: </td>
<td><?php 

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Evaluación: </td>
<td><?php 

$options= array('--Select--');
foreach ($evaluaciones as $row){
	$options[$row->idevaluacion]= $row->nombre;
}

 echo form_dropdown("idevaluacion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("evaluacion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

