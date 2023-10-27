<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignaturadeldocente/save") ?>
<?php echo form_hidden("idasignaturadeldocente")  ?>
<table>



<tr>
<td> Asignatura: </td>
<td><?php 

$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}
 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Docente: </td>
<td><?php 

$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}
 echo form_dropdown("iddocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Documento: </td>
<td><?php 

$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
 echo form_dropdown("iddocumento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>













<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignaturadeldocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

