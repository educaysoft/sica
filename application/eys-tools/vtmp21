<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("documentoportafolio/save") ?>
<?php echo form_hidden("iddocumentoportafolio")  ?>
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
foreach ($portafolios as $row){
	$options[$row->idportafolio]= $row->lapersona." - ".$row->elperiodo;
}

 echo form_dropdown("idportafolio",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Actividad academica: </td>
<td><?php 

$options= array('--Select--');
foreach ($docenteactividadacademicas as $row){
	$options[$row->iddocenteactividadacademica]=$row->item." - ". $row->eldistributivodocente." - ".$row->nombreactividad;
}

 echo form_dropdown("iddocenteactividadacademica",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Minutos ocupados: </td>
<td><?php echo form_input("minutosocupados","", array("placeholder"=>"Minutos utilizados"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documentoportafolio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

