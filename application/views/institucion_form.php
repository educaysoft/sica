<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("telefono/save") ?>
<?php echo form_hidden("idtelefono")  ?>
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
<td> Telefono: </td>
<td><?php echo form_input("numero","", array("placeholder"=>"Numero del telefono"))  ?></td>
</tr>

<tr>
<td> Operadora: </td>
<td><?php 

$options= array('--Select--');
foreach ($operadoras as $row){
	$options[$row->idoperadora]= $row->nombre;
}

 echo form_dropdown("idoperadora",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Estado: </td>
<td><?php 

$options= array('--Select--');
foreach ($telefono_estados as $row){
	$options[$row->idtelefono_estado]= $row->nombre;
}

 echo form_dropdown("idtelefono_estado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("telefono","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

