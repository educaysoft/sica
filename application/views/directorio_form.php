<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("directorio/save") ?>
<?php echo form_hidden("iddirectorio")  ?>
<table>


<tr>
<td> Ordenador: </td>
<td><?php 

$options= array('--Select--');
foreach ($ordenadores as $row){
	$options[$row->idordenador]= $row->nombre;
}

 echo form_dropdown("idordenador",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Nombre del directorio  </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de directorio"))  ?></td>
</tr>

<tr>
<td> Ruta: </td>
<td><?php echo form_input("ruta","", array("placeholder"=>"Ruta del directorio "))  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("directorio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

