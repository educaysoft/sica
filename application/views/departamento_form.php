<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("departamento/save") ?>
<?php echo form_hidden("iddepartamento")  ?>
<table>

<tr>
<td> Unidad </td>
<td><?php 

$options= array('--Select--');
foreach ($unidades as $row){
	$options[$row->idunidad]= $row->nombre;
}

 echo form_dropdown("idunidad",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre"))  ?></td>
</tr>

<tr>
<td> Iniciales: </td>
<td><?php echo form_input("iniciales","", array("placeholder"=>"Iniciales de la institucion"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("departamento","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

