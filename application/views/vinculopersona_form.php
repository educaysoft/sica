<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("vinculopersona/save") ?>
<?php echo form_hidden("idvinculopersona")  ?>
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
<td> Vinculopersona: </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de Unidad"))  ?></td>
</tr>

<tr>
<td> Estado: </td>
<td><?php 

$options= array('--Select--');
foreach ($vinculopersona_estados as $row){
	$options[$row->idvinculopersona_estado]= $row->nombre;
}

 echo form_dropdown("idvinculopersona_estado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("vinculopersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

