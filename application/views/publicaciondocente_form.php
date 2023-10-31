<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("publicaciondocente/save") ?>
<?php echo form_hidden("idpublicaciondocente")  ?>
<table>


<tr>
<td> Docente: </td>
<td><?php 

$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]=$row->eldocente;
}

 echo form_dropdown("iddocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Tipo de referencias: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipopublicaciondocentes as $row){
	$options[$row->idtipopublicaciondocente]=$row->nombre;

}

 echo form_dropdown("idtipopublicaciondocente",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Titulo de la referencias: </td>
<td><?php echo form_input("titulo","", array("placeholder"=>"Titulo de la referencia"))  ?></td>
</tr>

<tr>
<td> url de la referencias: </td>
<td><?php echo form_input("url","", array("placeholder"=>"direccion web de la referencia"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("publicaciondocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

