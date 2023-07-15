<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("metodoaprendizajetema/save") ?>
<?php echo form_hidden("idmetodoaprendizajetema")  ?>
<table>


<tr>
<td> Asignatura: </td>
<td><?php 

$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->idtema]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idtema",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Tipo de horas: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipometodoaprendizajetemas as $row){
	$options[$row->idtipometodoaprendizajetema]=$row->nombre;

}

 echo form_dropdown("idtipometodoaprendizajetema",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Cantidad de horas: </td>
<td><?php echo form_input("cantidad","", array("placeholder"=>"Cantidad de horas(float)"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("metodoaprendizajetema","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

