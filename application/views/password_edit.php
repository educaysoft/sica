<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("password/save_edit") ?>
<?php echo form_hidden("idpassword",$password['idpassword'])  ?>
<table>


<tr>
<td> Usuario: </td>
<td><?php 

$options= array('--Select--');
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}

 echo form_dropdown("idusuario",$options,$password['idusuario']);  ?></td>
</tr>



<tr>
<td> Modulo: </td>
<td><?php 

$options= array('--Select--');
foreach ($modulos as $row){
	$options[$row->idmodulo]= $row->nombre;
}

 echo form_dropdown("idmodulo",$options,$password['idmodulo']);  ?></td>
</tr>


<tr>
<td> Nivelpassword: </td>
<td><?php 

$options= array('--Select--');
foreach ($nivelpasswords as $row){
	$options[$row->idnivelpassword]= $row->nombre;
}

 echo form_dropdown("idnivelpassword",$options,$password['idnivelpassword']);  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("password","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>
