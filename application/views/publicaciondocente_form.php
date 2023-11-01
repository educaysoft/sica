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
<td> Publicacion: </td>
<td><?php 

$options= array('--Select--');
foreach ($publicacions as $row){
	$options[$row->idpublicacion]=$row->titulo;

}

 echo form_dropdown("idpublicacion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>






<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("publicaciondocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

