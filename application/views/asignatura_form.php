<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignatura/save") ?>
<?php echo form_hidden("idasignatura")  ?>
<table>


<tr>
<td> Código </td>
<td><?php echo form_input("codigo","", array("placeholder"=>"Código"))  ?></td>
</tr>


<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la artículo"))  ?></td>
</tr>







<tr>
<td> Malla: </td>
<td><?php 

$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]= $row->nombrecorto;
}

 echo form_dropdown("idmalla",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignatura","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

