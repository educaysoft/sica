<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("periodoacademico/save") ?>
<table>


<tr>
<td> Departamento/Carrera: </td>
<td><?php 

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Nombre corto </td>
<td><?php echo form_input("nombrecorto","", array("placeholder"=>"Nombre corto de periodoacademico"))  ?></td>
</tr>

<tr>
<td> Nombre largo: </td>
<td><?php echo form_input("nombrelargo","", array("placeholder"=>"Nombre largo de periodoacademico"))  ?></td>
</tr>


<tr>
<td> Fecha de inicio: </td>
<td><?php echo form_input("fechainicio","", array("placeholder"=>"Fecha de inicio del periodoacademico","type"=>"date"))  ?></td>
</tr>


<tr>
<td> Fecha de fin: </td>
<td><?php echo form_input("fechafin","", array("placeholder"=>"Fecha de finalizacion del periodoacademico","type"=>"date"))  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("periodoacademico","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

