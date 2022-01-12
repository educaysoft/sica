<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("respuesta/save") ?>
<?php echo form_hidden("idrespuesta")  ?>
<table>


<tr>
<td> Institución </td>
<td><?php 

$options= array('--Select--');
foreach ($preguntas as $row){
	$options[$row->idpregunta]= $row->pregunta;
}

 echo form_dropdown("idpregunta",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Nombre </td>
<td><?php echo form_input("respuesta","", array("placeholder"=>"Nombre de Respuesta"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("respuesta","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

