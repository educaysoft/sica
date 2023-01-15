<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignaturadocente/save") ?>
<?php echo form_hidden("idasignaturadocente")  ?>
<table>



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
<td> DistributivoDocente: </td>
<td><?php 

$options= array('--Select--');
foreach ($distributivodocentes as $row){
	$options[$row->iddistributivodocente]= $row->eldistributivodocente;
}

 echo form_dropdown("iddistributivodocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Malla: </td>
<td><?php 

$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]=$row->nombre;
}

 echo form_dropdown("idmalla",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







<tr>
<td> Asignatura: </td>
<td><?php 

$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla."-".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Paralelo: </td>
<td><?php 

$options= array('--Select--');
foreach ($paralelos as $row){
	$options[$row->idparalelo]= $row->nombre;
}

 echo form_dropdown("idparalelo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignaturadocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

