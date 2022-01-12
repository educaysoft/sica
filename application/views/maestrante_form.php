
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("maestrante/save") ?>
<?php echo form_hidden("idmaestrante")  ?>
<table>


<tr>
<td>  Persona </td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Estado </td>
<td><?php 

$options= array('--Select--');
foreach ($maestrante_estadoes as $row){
	$options[$row->idmaestrante_estado]= $row->nombre;
}

 echo form_dropdown("idmaestrante_estado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Maestria: </td>
<td><?php 

$options= array('--Select--');
foreach ($maestrias as $row){
	$options[$row->idmaestria]= $row->nombre;
}

 echo form_dropdown("idmaestria",$options, set_select('--Select--','default_value'));  ?></td>
</tr>






<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("maestrante","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

