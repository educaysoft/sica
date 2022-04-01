<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("pregunta/save") ?>
<?php echo form_hidden("idpregunta")  ?>
<table>


<tr>
<td> Evaluación </td>
<td><?php 

$options= array('--Select--');
foreach ($evaluaciones as $row){
	$options[$row->idevaluacion]= $row->nombre;
}

 echo form_dropdown("idevaluacion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Nombre </td>
<td><?php echo form_input("pregunta","", array("placeholder"=>"Nombre de Pregunta"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("pregunta","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

