<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("referenciasasignatura/save") ?>
<?php echo form_hidden("idreferenciasasignatura")  ?>
<table>


<tr>
<td> Asignatura: </td>
<td><?php 

$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Tipo de referencias: </td>
<td><?php 

$options= array('--Select--');
foreach ($tiporeferenciasasignaturas as $row){
	$options[$row->idtiporeferenciasasignatura]=$row->nombre;

}

 echo form_dropdown("idtiporeferenciasasignatura",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Titulo de la referencias: </td>
<td><?php echo form_input("titulo","", array("placeholder"=>"Titulo de la referencia"))  ?></td>
</tr>

<tr>
<td> url de la referencias: </td>
<td><?php echo form_input("url","", array("placeholder"=>"direccion web de la referencia"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("referenciasasignatura","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

