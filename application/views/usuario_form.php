
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("usuario/save") ?>
<?php echo form_hidden("idusuario")  ?>
<table>
<tr>
<td> Contraseña </td>
<td><?php echo form_input("password","", array("placeholder"=>"Password"))  ?></td>
</tr>

<tr>
<td> Id Persona </td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Id Perfil </td>
<td><?php 

$options= array('--Select--');
foreach ($perfiles as $row){
	$options[$row->idperfil]= $row->nombre;
}

 echo form_dropdown("idperfil",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Email </td>
<td><?php echo form_input("email","", array("placeholder"=>"email"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("usuario","Atrás") ?> </td>
</tr>

<tr>
<td> Páginas de inicio: </td>
<td><?php 

$options= array('--Select--');
foreach ($paginas as $row){
	$options[$row->idpagina]= $row->nombre;
}

 echo form_dropdown("idpagina",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




</table>
<?php echo form_close();?>

