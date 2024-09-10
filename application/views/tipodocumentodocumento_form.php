<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipodocumentodocumento/save") ?>
<?php echo form_hidden("idtipodocumentodocumento")  ?>
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
<td> tipodocumento: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipodocumentos as $row){
	$options[$row->idtipodocumento]= $row->idtipodocumento." - ".$row->nombre;
}

 echo form_dropdown("idtipodocumento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipodocumentodocumento","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

