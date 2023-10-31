<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("relacionpersona/save") ?>
<?php echo form_hidden("idrelacionpersona")  ?>
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
<td> Tipo relación: </td>
<td><?php 

$options= array('--Select--');
foreach ($tiporelacionpersonas as $row){
	$options[$row->idtiporelacionpersona]= $row->nombre;
}

 echo form_dropdown("idtiporelacionpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("relacionpersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

