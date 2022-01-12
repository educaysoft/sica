<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("persona/save") ?>
<?php echo form_hidden("idpersona")  ?>
<table>
<tr>
<td> Cedula </td>
<td><?php echo form_input("cedula","", array("placeholder"=>"Cedula"))  ?></td>
</tr>

<tr>
<td> Nombres </td>
<td><?php echo form_input("nombres","", array("placeholder"=>"Nombres"))  ?></td>
</tr>


<tr>
<td> Apellidos </td>
<td><?php echo form_input("apellidos","", array("placeholder"=>"Apellidos"))  ?></td>
</tr>

<tr>
<td> Fecha Nacimiento: </td>
<td><?php echo form_input(array("name"=>"fechanacimiento","id"=>"fechanacimiento","type"=>"date"));  ?></td>
</tr>







<tr>
<td> Archivo Foto </td>
<td><?php echo form_input("foto","", array("placeholder"=>"fechafoto"))  ?></td>
</tr>


<tr>
<td> Genero: </td>
<td><?php 

$options= array('--Select--');
foreach ($generos as $row){
	$options[$row->idgenero]= $row->nombre;
}

 echo form_dropdown("idgenero",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("persona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

