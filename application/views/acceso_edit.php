<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("acceso/save_edit") ?>
<?php echo form_hidden("idacceso",$acceso['idacceso'])  ?>
<table>


<tr>
<td> Usuario: </td>
<td><?php 

$options= array('--Select--');
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}

 echo form_dropdown("idusuario",$options,$acceso['idusuario']);  ?></td>
</tr>



<tr>
<td> Modulo: </td>
<td><?php 

$options= array('--Select--');
foreach ($modulos as $row){
	$options[$row->idmodulo]= $row->nombre;
}

 echo form_dropdown("idmodulo",$options,$acceso['idmodulo']);  ?></td>
</tr>


<tr>
<td> Nivelacceso: </td>
<td><?php 

$options= array('--Select--');
foreach ($nivelaccesos as $row){
	$options[$row->idnivelacceso]= $row->nombre;
}

 echo form_dropdown("idnivelacceso",$options,$acceso['idnivelacceso']);  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("acceso","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>
