<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("miembrocomisionacademica/save") ?>
<?php echo form_hidden("idmiembrocomisionacademica")  ?>
<table>

<tr>
<td> Periodo academico: </td>
<td><?php 

$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrelargo;
}

 echo form_dropdown("idperiodoacademico",$options, set_select('--Select--','default_value'));  ?></td>
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
<td> Comision academica: </td>
<td><?php 

$options= array('--Select--');
foreach ($comisionacademicas as $row){
	$options[$row->idcomisionacademica]= $row->nombre;
}

 echo form_dropdown("idcomisionacademica",$options, set_select('--Select--','default_value'));  ?></td>
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
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("miembrocomisionacademica","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

