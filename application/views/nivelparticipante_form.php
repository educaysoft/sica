<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("nivelparticipante/save") ?>
<?php echo form_hidden("idnivelparticipante")  ?>
<table>

<tr>
<td> Tipo de evento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipoeventos as $row){
	$options[$row->idtipoevento]= $row->nombre;
}

 echo form_dropdown("idtipoevento",$options, set_select('--Select--',"default_value"));  ?></td>
</tr>



<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de nivelparticipante"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("nivelparticipante","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

