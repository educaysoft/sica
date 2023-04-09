<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("vitacora/save_edit") ?>
<?php echo form_hidden("idvitacora",$vitacora['idvitacora'])  ?>
<table>


<tr>
<td> Usuario: </td>
<td><?php 

$options= array('--Select--');
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}

 echo form_dropdown("idusuario",$options,$vitacora['idusuario']);  ?></td>
</tr>



<tr>
<td> Modulo: </td>
<td><?php 

$options= array('--Select--');
foreach ($modulos as $row){
	$options[$row->idmodulo]= $row->nombre;
}

 echo form_dropdown("idmodulo",$options,$vitacora['idmodulo']);  ?></td>
</tr>


<tr>
<td> Nivelvitacora: </td>
<td><?php 

$options= array('--Select--');
foreach ($nivelvitacoras as $row){
	$options[$row->idnivelvitacora]= $row->nombre;
}

 echo form_dropdown("idnivelvitacora",$options,$vitacora['idnivelvitacora']);  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("vitacora","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>
