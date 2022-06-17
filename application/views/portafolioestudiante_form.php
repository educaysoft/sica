<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("portafolioestudiante/save") ?>
<?php echo form_hidden("idportafolioestudiante")  ?>
<table>


<tr>
<td> Estudiante: </td>
<td><?php 

$options= array('--Select--');
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}

 echo form_dropdown("idestudiante",$options, set_select('--Select--','default_value'));  ?></td>
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
foreach ($estado_portafolios as $row){
	$options[$row->idestado_portafolio]= $row->nombre;
}

 echo form_dropdown("idestado_portafolio",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("portafolioestudiante","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

