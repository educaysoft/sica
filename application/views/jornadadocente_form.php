<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("jornadadocente/save") ?>
<?php echo form_hidden("idjornadadocente")  ?>
<table>




<div class="form-group row">
    <label class="col-md-2 col-form-label">Asignatura docente :</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($asignaturadocentes as $row){
		$options[$row->idasignaturadocente]= $row->laasignatura."-".$row->paralelo;
	}
	 echo form_dropdown("idasignaturadocente",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">Día de semana :</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($diasemanas as $row){
		$options[$row->iddiasemana]= $row->nombre;
	}
	 echo form_dropdown("iddiasemana",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Hora inicio:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horainicio","id"=>"horainicio","type"=>"time"));  

?>
</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
	<div class="col-md-10">
	<?php

 echo form_input("duracionminutos","", array("placeholder"=>"Duración de la jornada",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("jornadadocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

