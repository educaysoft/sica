<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("provinciapersona/save") ?>
<?php echo form_hidden("idprovinciapersona")  ?>

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
foreach ($provincias as $row){
	$options[$row->idprovincia]= $row->nombre;
}

 echo form_dropdown("idprovincia",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fechadesde: </td>
<td><?php echo form_input(array("name"=>"fechadesde","id"=>"fechadesde","type"=>"date"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("provinciapersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

