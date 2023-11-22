
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("departamentodestino/save_edit") ?>
<table>


<tr>
<td> Departamento/carrera: </td>
<td><?php 

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $departamentodestino['iddepartamento']);  ?></td>
</tr>




<tr>
<td> Estudio: </td>
<td><?php
$options= array('--Select--');
foreach ($estudios as $row){
	$options[$row->idestudio]= $row->lapersona.' - '.$row->titulo;

}
 echo form_dropdown("idestudio",$options,$departamentodestino['idestudio']);  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("departamentodestino","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

