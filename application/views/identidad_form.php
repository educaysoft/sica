<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("identidad/save") ?>
<?php echo form_hidden("ididentidad")  ?>

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
<td> Tipo documento: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipodocumentos as $row){
	$options[$row->idtipodocumento]= $row->nombre;
}

 echo form_dropdown("idtipodocumento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> No de identidad: </td>
<td><?php echo form_input(array("name"=>"identidad","id"=>"identidad","type"=>"text"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("identidad","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

