<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("ingregre/save") ?>
<?php echo form_hidden("idingregre")  ?>
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
<td> Fecha: </td>
<td><?php echo form_input("fechaingregre","", array("placeholder"=>"fecha del ingregre"))  ?></td>
</tr>


<tr>
<td> valor: </td>
<td><?php echo form_input("valor","", array("placeholder"=>"valor del ingregre"))  ?></td>
</tr>

<tr>
<td> Institucion: </td>
<td><?php 

$options= array('--Select--');
foreach ($institucions as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Tipo Ingr-Egre: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipoingregres as $row){
	$options[$row->idtipoingregre]= $row->nombre;
}

 echo form_dropdown("idtipoingregre",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Detalle: </td>
<td><?php echo form_input("detalle","", array("placeholder"=>"detalle del ingreso o egreso"))  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("ingregre","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

