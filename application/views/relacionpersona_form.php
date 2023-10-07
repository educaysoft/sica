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
<td> Relacionpersona: </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de Unidad"))  ?></td>
</tr>

<tr>
<td> Estado: </td>
<td><?php 

$options= array('--Select--');
foreach ($relacionpersona_estados as $row){
	$options[$row->idrelacionpersona_estado]= $row->nombre;
}

 echo form_dropdown("idrelacionpersona_estado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("relacionpersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

