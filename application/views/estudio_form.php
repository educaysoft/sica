<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("estudio/save") ?>
<?php echo form_hidden("idestudio")  ?>
<table>


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
<td> Institución: </td>
<td><?php 

$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fecha de inscripción: </td>
<td><?php echo form_input(array("name"=>"fechainscripcion","id"=>"fechainscripcion","type"=>"date"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("estudio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

