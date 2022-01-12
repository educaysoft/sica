<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("ascenso/save") ?>
<?php echo form_hidden("idascenso")  ?>
<table>


<tr>
<td> Usuario: </td>
<td><?php 

$options= array('--Select--');
foreach ($clientes as $row){
	$options[$row->idcliente]= $row->elcliente;
}

 echo form_dropdown("idcliente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Eventoo: </td>
<td><?php 

$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Cinturon: </td>
<td><?php 

$options= array('--Select--');
foreach ($cinturones as $row){
	$options[$row->idcinturon]= $row->color;
}

 echo form_dropdown("idcinturon",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("ascenso","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

