<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("estapamovilidadalumno/save") ?>
<?php echo form_hidden("idestapamovilidadalumno")  ?>

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
<td> Fechadesde: </td>
<td><?php echo form_input(array("name"=>"fechadesde","id"=>"fechadesde","type"=>"date"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("estapamovilidadalumno","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

