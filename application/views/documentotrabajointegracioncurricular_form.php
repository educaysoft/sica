<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("documentotrabajointegracioncurricular/save") ?>
<?php echo form_hidden("iddocumentotrabajointegracioncurricular")  ?>
<table>


<tr>
<td> Documento: </td>
<td><?php 

$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]=$row->iddocumento.' - '.$row->autor." - ". $row->asunto;
}

 echo form_dropdown("iddocumento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Portafolio: </td>
<td><?php 

$options= array('--Select--');
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->idtrabajointegracioncurricular." - ".$row->nombre;
}

 echo form_dropdown("idtrabajointegracioncurricular",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documentotrabajointegracioncurricular","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

