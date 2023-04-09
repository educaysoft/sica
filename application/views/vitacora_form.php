<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("vitacora/save") ?>
<?php echo form_hidden("idvitacora")  ?>
<table>


<tr>
<td> Usuario: </td>
<td><?php 

$options= array('--Select--');
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}

 echo form_dropdown("idusuario",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Modulo: </td>
<td><?php 

$options= array('--Select--');
foreach ($modulos as $row){
	$options[$row->idmodulo]= $row->nombre;
}

 echo form_dropdown("idmodulo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Nivelvitacora: </td>
<td><?php 

$options= array('--Select--');
foreach ($nivelvitacoras as $row){
	$options[$row->idnivelvitacora]= $row->nombre;
}

 echo form_dropdown("idnivelvitacora",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("vitacora","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

