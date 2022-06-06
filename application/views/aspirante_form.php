<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("aspirante/save") ?>
<?php echo form_hidden("idaspirante")  ?>
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
<td> Fecha de desde: </td>
<td><?php echo form_input(array("name"=>"fechadesde","id"=>"fechadesde","type"=>"date"));  ?></td>
</tr>

<tr>
<td> Fecha de hasta: </td>
<td><?php echo form_input(array("name"=>"fechahasta","id"=>"fechahasta","type"=>"date"));  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("aspirante","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

