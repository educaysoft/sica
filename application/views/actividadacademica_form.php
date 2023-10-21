<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("actividadacademica/save") ?>
<?php echo form_hidden("idactividadacademica")  ?>
<table>







<tr>
<td> Tipo de referencias: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipoactividadacademicas as $row){
	$options[$row->idtipoactividadacademica]=$row->nombre;

}

 echo form_dropdown("idtipoactividadacademica",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> nombre de actividad: </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la actividad"))  ?></td>
</tr>


<tr>
<td> Item-codigo: </td>
<td><?php echo form_input("item","", array("placeholder"=>"Item o codigo"))  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("actividadacademica","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

