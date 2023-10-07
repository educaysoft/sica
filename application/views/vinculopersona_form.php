<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("vinculopersona/save") ?>
<?php echo form_hidden("idvinculopersona")  ?>
<table>


<tr>
<td> Persona: </td>
<td><?php 

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fecha desde: </td>
<td><?php echo form_input("fechadesde","", array("placeholder"=>"Fecha desde","type"=>"date"))  ?></td>
</tr>

<tr>
<td> Fecha hasta: </td>
<td><?php echo form_input("fechahasta","", array("placeholder"=>"Fecha hasta","type"=>"date"))  ?></td>
</tr>



<tr>
<td> Relación: </td>
<td><?php 

$options= array('--Select--');
foreach ($relacionpersonas as $row){
	$options[$row->idrelacionpersona]= $row->lapersona." - ".$row->larelacion;
}

 echo form_dropdown("idrelacionpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("vinculopersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

