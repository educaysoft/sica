
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("cursounidad/save") ?>
<table>


<tr>
<td> Curso: </td>
<td><?php 

$options= array('--Select--');
foreach ($cursos as $row){
	$options[$row->idcurso]= $row->nombre;
}

 echo form_dropdown("idcurso",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Videotutorial: </td>
<td><?php
$options= array('--Select--');
foreach ($videotutoriales as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}

 echo form_dropdown("idvideotutorial",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> No de la unidad </td>
<td><?php echo form_input(array("name"=>"unidad","id"=>"unidad"));  ?></td>
</tr>

<tr>
<td> Nombre de la unidad: </td>
<td><?php echo form_input(array("name"=>"nombre","id"=>"nombre"));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("cursounidad","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

