
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("emisor/save_edit") ?>
<table>


<tr>
<td> Asunto: </td>
<td><?php 

$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $emisor['iddocumento']);  ?></td>
</tr>




<tr>
<td> Remitente: </td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->lapersona;
}
 echo form_dropdown("idpersona",$options,$emisor['idpersona']);  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("emisor","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

