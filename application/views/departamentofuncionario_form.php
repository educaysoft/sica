<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("departamentofuncionario/save") ?>
<?php echo form_hidden("iddepartamentofuncionario")  ?>

<?php

if(isset($_GET["idfuncionario"]))
{
	$idfuncionario=$_GET["idfuncionario"];
}
?>
<table>


<tr>
<td> Funcionario: </td>
<td><?php 

$options= array('--Select--');
foreach ($funcionarios as $row){
	$options[$row->idfuncionario]= $row->apellidos." ".$row->nombres;
}
 if(isset($idfuncionario))
 {
 echo form_dropdown("idfuncionario",$options,$idfuncionario );
 }else{

 echo form_dropdown("idfuncionario",$options,set_select('--Select--','default_value'));

 }

?></td>

</tr>



<tr>
<td> Departamento: </td>
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
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("departamentofuncionario","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

