<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("matricula/save") ?>
<?php echo form_hidden("idmatricula")  ?>

<?php

if(isset($_GET["idestudiante"]))
{
	$idestudiante=$_GET["idestudiante"];
}
?>
<table>


<tr>
<td> Alumno: </td>
<td><?php 

$options= array('--Select--');
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}
 if(isset($idestudiante))
 {
 echo form_dropdown("idestudiante",$options,$idestudiante );
 }else{

 echo form_dropdown("idestudiante",$options,set_select('--Select--','default_value'));

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
<td> Nivel </td>
<td><?php 

$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrelargo;
}

 echo form_dropdown("idperiodoacademico",$options, set_select('--Select--','default_value'));  ?></td>
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
<td> Nivel </td>
<td><?php 

$options= array('--Select--');
foreach ($nivelacademicos as $row){
	$options[$row->idnivelacademico]= $row->nombre;
}

 echo form_dropdown("idnivelacademico",$options, set_select('--Select--','default_value'));  ?></td>
</tr>








<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("matricula","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

