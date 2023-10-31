
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("pertinencia/save") ?>
<table>
<tr>
<td> Estudio: </td>
<td><?php
$options= array('--Select--');
foreach ($estudios as $row){
	$options[$row->idestudio]= $row->lapersona.' - '.$row->titulo;
}

 echo form_dropdown("idestudio",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Departamento/carrera: </td>
<td><?php 

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("pertinencia","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

