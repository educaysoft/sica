<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("horasasignatura/save") ?>
<?php echo form_hidden("idhorasasignatura")  ?>
<table>


<tr>
<td> Persona: </td>
<td><?php 

$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Horasasignatura: </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de Unidad"))  ?></td>
</tr>

<tr>
<td> Estado: </td>
<td><?php 

$options= array('--Select--');
foreach ($horasasignatura_estados as $row){
	$options[$row->idhorasasignatura_estado]= $row->nombre;
}

 echo form_dropdown("idhorasasignatura_estado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("horasasignatura","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

