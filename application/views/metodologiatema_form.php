<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("metodologiatema/save") ?>
<?php echo form_hidden("idmetodologiatema")  ?>
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
<td> Tipo de horas: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipometodologiatemas as $row){
	$options[$row->idtipometodologiatema]=$row->nombre;

}

 echo form_dropdown("idtipometodologiatema",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Cantidad de horas: </td>
<td><?php echo form_input("cantidad","", array("placeholder"=>"Cantidad de horas(float)"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("metodologiatema","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

