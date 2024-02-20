
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("egresado/save_edit") ?>
<?php echo form_hidden('idegresado',$egresado['idegresado']) ?>
<table>


<tr>
<td> Asunto: </td>
<td><?php 

$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $egresado['iddocumento']);  ?></td>
</tr>




<tr>
<td> Remitente: </td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->lapersona;
}
 echo form_dropdown("idpersona",$options,$egresado['idpersona']);  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("egresado","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

