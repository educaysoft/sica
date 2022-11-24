<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("horariodocente/save") ?>
<?php echo form_hidden("idhorariodocente")  ?>
<table>


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
<td> Institución: </td>
<td><?php 

$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombre;
}

 echo form_dropdown("idperiodoacademico",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fecha de inscripción: </td>
<td><?php echo form_input(array("name"=>"fechainscripcion","id"=>"fechainscripcion","type"=>"date"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("horariodocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

