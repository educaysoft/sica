<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("uniforme/save") ?>
<?php echo form_hidden("iduniforme")  ?>
<table>


<tr>
<td> Institución </td>
<td><?php 

$options= array('--Select--');
foreach ($articuloes as $row){
	$options[$row->idarticulo]= $row->nombre;
}

 echo form_dropdown("idarticulo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Color </td>
<td><?php echo form_input("color","", array("placeholder"=>"Color del uniforme"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("uniforme","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

