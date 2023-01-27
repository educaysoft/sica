<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("nacionalidadpersona/save") ?>
<?php echo form_hidden("idnacionalidadpersona")  ?>

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
<td> Nacionalidad: </td>
<td><?php 

$options= array('--Select--');
foreach ($nacionalidades as $row){
	$options[$row->idnacionalidad]= $row->nombre;
}

 echo form_dropdown("idnacionalidad",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fechadesde: </td>
<td><?php echo form_input(array("name"=>"fechadesde","id"=>"fechadesde","type"=>"date"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("nacionalidadpersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

