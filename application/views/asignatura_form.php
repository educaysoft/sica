<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignatura/save") ?>
<?php echo form_hidden("idasignatura")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la artículo"))  ?></td>
</tr>


<tr>
<td> Detalle: </td>
<td><?php echo form_input("detalle","", array("placeholder"=>"Detalle de artiulo"))  ?></td>
</tr>

<tr>
<td> Institución: </td>
<td><?php 

$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Categoría: </td>
<td><?php 

$options= array('--Select--');
foreach ($categorias as $row){
	$options[$row->idcategoria]= $row->nombre;
}

 echo form_dropdown("idcategoria",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignatura","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

