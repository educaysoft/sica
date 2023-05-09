<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("pregunta/save") ?>
<?php echo form_hidden("idpregunta")  ?>
<table>


<tr>
<td> Evaluación </td>
<td><?php 

$options= array('--Select--');
foreach ($reactivos as $row){
	$options[$row->idreactivo]= $row->nombre;
}

 echo form_dropdown("idreactivo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Nombre </td>
<td><?php
	  $eys_arrctl=array("name"=>'pregunta','rows' => '4',   'cols' => '20','placeholder'=>'La pregunta','style'=>'width:600px;');
 echo form_textarea($eys_arrctl);
?></td>	
	
	
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("pregunta","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

