<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("docenteactividadacademica/save") ?>
<?php echo form_hidden("iddocenteactividadacademica")  ?>
<table>


<tr>
<td> Docente: </td>
<td><?php 

$options= array('--Select--');
foreach ($distributivodocentes as $row){
	$options[$row->iddistributivodocente]= $row->eldistributivodocente;
}

 echo form_dropdown("iddistributivodocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Actividad: </td>
<td><?php 

$options= array('--Select--');
foreach ($actividadacademicas as $row){
	$options[$row->idactividadacademica]=$row->item.' - '.$row->nombre;

}

 echo form_dropdown("idactividadacademica",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Numero horas semanales: </td>
<td><?php echo form_input("numerohoras","", array("placeholder"=>"Numero de horas semanales"))  ?></td>
</tr>

<tr>
<td> Detalle: </td>
<td><?php echo form_input("detalle","", array("placeholder"=>"detalle"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("docenteactividadacademica","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

