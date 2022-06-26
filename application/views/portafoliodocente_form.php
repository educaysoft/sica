<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("portafoliodocente/save") ?>
<?php echo form_hidden("idportafoliodocente")  ?>
<table>


<tr>
<td> Estudiante: </td>
<td><?php 

$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

 echo form_dropdown("iddocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Documento del portafolio: </td>
<td><?php 

$options= array('--Select--');
foreach ($portafoliomodelos as $row){
	$options[$row->idportafoliomodelo]= $row->nombre;
}

 echo form_dropdown("idportafoliomodelo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Estado: </td>
<td><?php 

$options= array('--Select--');
foreach ($portafolioestados as $row){
	$options[$row->idportafolioestado]= $row->nombre;
}

 echo form_dropdown("idportafolioestado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("portafoliodocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

