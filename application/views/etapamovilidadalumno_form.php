<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("etapamovilidadalumno/save") ?>
<?php echo form_hidden("idetapamovilidadalumno")  ?>

<?php

if(isset($_GET["idmovilidadalumno"]))
{
	$idmovilidadalumno=$_GET["idmovilidadalumno"];
}
?>
<table>


<tr>
<td> Movilidad alumno: </td>
<td><?php 

$options= array('--Select--');
foreach ($movilidadalumnos as $row){
	$options[$row->idmovilidadalumno]= $row->lapersona;
}
 if(isset($idmovilidadalumno))
 {
 echo form_dropdown("idmovilidadalumno",$options,$idmovilidadalumno );
 }else{

 echo form_dropdown("idmovilidadalumno",$options,set_select('--Select--','default_value'));

 }

?></td>

</tr>



<tr>
<td> Etapa Movilidad: </td>
<td><?php 

$options= array('--Select--');
foreach ($etapamovilidads as $row){
	$options[$row->idetapamovilidad]= $row->nombre;
}

 echo form_dropdown("idetapamovilidad",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fecha: </td>
<td><?php echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("etapamovilidadalumno","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

