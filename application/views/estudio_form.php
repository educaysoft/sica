<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("estudio/save") ?>
<?php echo form_hidden("idestudio")  ?>

<?php

if(isset($_GET["idpersona"]))
{
	$idpersona=$_GET["idpersona"];
}
?>
<table>


<tr>
<td> Persona: </td>
<td><?php 

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}
 if(isset($idpersona))
 {
 echo form_dropdown("idpersona",$options,$idpersona );
 }else{

 echo form_dropdown("idpersona",$options,set_select('--Select--','default_value'));

 }

?></td>

</tr>



<tr>
<td> Institución: </td>
<td><?php 

$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Nivel estudio: </td>
<td><?php 

$options= array('--Select--');
foreach ($nivelestudios as $row){
	$options[$row->idnivelestudio]= $row->nombre;
}

 echo form_dropdown("idnivelestudio",$options, set_select('--Select--','default_value'));  ?></td>
</tr>





<tr>
<td> Título obtenido: </td>
<td><?php echo form_input(array("name"=>"titulo","id"=>"titulo","type"=>"text"));  ?></td>
</tr>

<tr>
<td> Fecha de registro: </td>
<td><?php echo form_input(array("name"=>"fecharegistro","id"=>"fecharegistro","type"=>"date"));  ?></td>
</tr>

<tr>
<td> Número registro: </td>
<td><?php echo form_input(array("name"=>"numeroregistro","id"=>"numeroregistro","type"=>"text"));  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("estudio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

