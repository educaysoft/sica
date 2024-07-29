<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("documentoexamencomplexivo/save") ?>
<?php echo form_hidden("iddocumentoexamencomplexivo")  ?>
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
<td> Examen complexivo: </td>
<td><?php 

$options= array('--Select--');
foreach ($examencomplexivos as $row){
	$options[$row->idexamencomplexivo]= $row->idexamencomplexivo." - ".$row->nombre;
}

 echo form_dropdown("idexamencomplexivo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documentoexamencomplexivo","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

