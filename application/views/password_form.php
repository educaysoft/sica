<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("password/save") ?>
<?php echo form_hidden("idpassword")  ?>
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
<td> Nivelpassword: </td>
<td><?php 

$options= array('--Select--');
foreach ($nivelpasswords as $row){
	$options[$row->idnivelpassword]= $row->nombre;
}

 echo form_dropdown("idnivelpassword",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("password","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

