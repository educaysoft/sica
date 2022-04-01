<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("videotutorial/save") ?>
<?php echo form_hidden("idvideotutorial")  ?>
<table>





<tr>
<td> Nombre del videotutorial  </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de videotutorial"))  ?></td>
</tr>

<tr>
<td> Enlace: </td>
<td><?php echo form_textarea("enlace","", array("placeholder"=>"Enlace del videotutorial "))  ?></td>
</tr>

<tr>
<td> Duración: </td>
<td><?php echo form_input("duracion","", array("placeholder"=>"Duracion del videotutorial "))  ?></td>
</tr>



<tr>
<td> Instructor: </td>
<td><?php 

$options= array('--Select--');
foreach ($instructores as $row){
	$options[$row->idinstructor]= $row->elinstructor;
}

 echo form_dropdown("idinstructor",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Evaluación: </td>
<td><?php 

$options= array('--Select--');
foreach ($evaluaciones as $row){
	$options[$row->idevaluacion]= $row->nombre;
}

 echo form_dropdown("idevaluacion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("videotutorial","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

