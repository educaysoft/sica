<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("distributivodocente/save") ?>
<?php echo form_hidden("iddistributivodocente")  ?>
<table>


<tr>
<td> Docente: </td>
<td><?php 

$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

 echo form_dropdown("iddocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Distributivo: </td>
<td><?php 

$options= array('--Select--');
foreach ($distributivos as $row){
	$options[$row->iddistributivo]= $row->eldistributivo;
}

 echo form_dropdown("iddistributivo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Dertamento: </td>
<td><?php 

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>






<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("distributivodocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

