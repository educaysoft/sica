
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("tutorexamencomplexivo/save") ?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Titulo/tema:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->nombre;
}

 echo form_dropdown("idtrabajointegracioncurricular",$options, set_select('--Select--','default_value'));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Docente tutorexamencomplexivo:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

 echo form_dropdown("iddocente",$options, set_select('--Select--','default_value')); 
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo de documento:</label>
<div class="col-md-10">
<?php
    $options= array('--Select--');
    foreach ($tipotutorexamencomplexivos as $row){
      $options[$row->idtipotutorexamencomplexivo]= $row->nombre;
    }
     echo form_dropdown("idtipotutorexamencomplexivo",$options, set_select('--Select--','default_value'),array('id'=>'idtipotutorexamencomplexivo')); 
?>
</div>
</div>








<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tutorexamencomplexivo","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

