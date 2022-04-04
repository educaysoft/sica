<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("detainventario/save") ?>
<?php echo form_hidden("iddetainventario")  ?>
<table>


<tr>
<td> Persona: </td>
<td><?php 

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>








<tr>
<td> Articulo: </td>
<td><?php 

$options= array('--Select--');
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

 echo form_dropdown("idarticulo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Estado: </td>
<td><?php 

$options= array('--Select--');
foreach ($inventarios as $row){
	$options[$row->idinventario]= $row->nombre;
}

 echo form_dropdown("idinventario",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Ubicación: </td>
<td><?php echo form_input("ubicacion","", array("placeholder"=>"Ubicación del bien"))  ?></td>
</tr>

<tr>
<td> Descripción del estado del bien: </td>
<td><?php echo form_input("descripcion","", array("placeholder"=>"Descripción del estado del bien"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("detainventario","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

