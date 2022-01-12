<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("resultado/save") ?>
<?php echo form_hidden("idresultado")  ?>
<table>


<tr>
<td> Evaluado: </td>
<td><?php 

$options= array('--Select--');
foreach ($evaluados as $row){
	$options[$row->idevaluado]= $row->persona;
}

 echo form_dropdown("idevaluado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Evaluación: </td>
</tr>









<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Generar"); ?><?php echo anchor("resultado","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

