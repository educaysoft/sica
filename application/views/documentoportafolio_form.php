<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("documentoportafolio/save") ?>
<?php echo form_hidden("iddocumentoportafolio")  ?>
<table>


<tr>
<td> Docente: </td>
<td><?php 

$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->eldocumento;
}

 echo form_dropdown("iddocumento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Periodo académico: </td>
<td><?php 

$options= array('--Select--');
foreach ($portafolios as $row){
	$options[$row->idportafolio]= $row->nombrecorto;
}

 echo form_dropdown("idportafolio",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documentoportafolio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

