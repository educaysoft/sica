<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("estudiante/save") ?>
<table>


<tr>
<td> Trabajo de integracion curricular: </td>
<td><?php 

$options= array('--Select--');
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->idtrabajointegracioncurricular." - ".$row->nombre;
}

 echo form_dropdown("idtrabajointegracioncurricular",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Egreasado: </td>
<td><?php
$options= array('--Select--');
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}

 echo form_dropdown("idestudiante",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("estudiante","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

