<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("metodologiastema/save") ?>
<?php echo form_hidden("idmetodologiastema")  ?>
<table>


<tr>
<td> Tema: </td>
<td><?php 

$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->idtema]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idtema",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Tipo de metodología: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipometodologiastemas as $row){
	$options[$row->idtipometodologiastema]=$row->nombre;

}

 echo form_dropdown("idtipometodologiastema",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Actividades: </td>
<td><?php echo form_input("actividades","", array("placeholder"=>"Actividades para aplicar la tecnica del metodo"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("metodologiastema","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

