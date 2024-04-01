<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("matricula/save") ?>
<?php echo form_hidden("idmatricula")  ?>

<?php

if(isset($_GET["idalumno"]))
{
	$idalumno=$_GET["idalumno"];
}
?>
<table>


<tr>
<td> Alumno: </td>
<td><?php 

$options= array('--Select--');
foreach ($alumnos as $row){
	$options[$row->idalumno]= $row->elalumno;
}
 if(isset($idalumno))
 {
 echo form_dropdown("idalumno",$options,$idalumno );
 }else{

 echo form_dropdown("idalumno",$options,set_select('--Select--','default_value'));

 }

?></td>

</tr>



<tr>
<td> Carrera: </td>
<td><?php 

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Tipo maticula: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipomatriculas as $row){
	$options[$row->idtipomatricula]= $row->nombre;
}

 echo form_dropdown("idtipomatricula",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Repeticon: </td>
<td><?php 

$options= array('--Select--');
foreach ($repeticions as $row){
	$options[$row->idrepeticion]= $row->nombre;
}

 echo form_dropdown("idrepeticion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>








<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("matricula","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

