<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("docente/save") ?>
<?php echo form_hidden("iddocente")  ?>
<table>

<tr>
<td> Departamento/Carrera: </td>
<td><?php 

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



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
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("docente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

