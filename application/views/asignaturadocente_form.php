<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignaturadocente/save") ?>
<?php echo form_hidden("idasignaturadocente")  ?>
<table>


<tr>
<td> Horario Docente: </td>
<td><?php 

$options= array('--Select--');
foreach ($horariodocentes as $row){
	$options[$row->idhorariodocente]= $row->elhorariodocente;
}

 echo form_dropdown("idhorariodocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Asignatura: </td>
<td><?php 

$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombrecorto;
}

 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignaturadocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

