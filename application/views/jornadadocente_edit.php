<?php echo form_open('jornadadocente/save_edit') ?>
<?php echo form_hidden('idjornadadocente',$jornadadocente['idjornadadocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />



<div class="form-group row">
<label class="col-md-2 col-form-label"> Id joranada docente:</label>
<div class="col-md-10">
<?php

$eys_arrinput=array('name'=>'idjornadadocente','value'=>$jornadadocente['idjornadadocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Asignatura docente:</label>
<div class="col-md-10">
<?php
 
$options= array('--Select--');
foreach ($asignaturadocentes as $row){
	$options[$row->idasignaturadocente]= $row->laasignatura." - ".$row->paralelo;
}
 echo form_dropdown("idasignaturadocente",$options, $jornadadocente['idasignaturadocente']); 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Día de semana:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($diasemanas as $row){
	$options[$row->iddiasemana]= $row->nombre;
}
 echo form_dropdown("iddiasemana",$options, $jornadadocente['iddiasemana']);  
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Hora inicio:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horainicio","id"=>"horainicio","value"=>$jornadadocente['horainicio'],"type"=>"time"));  

?>
</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
	<div class="col-md-10">
	<?php

 echo form_input( array("name"=>"duracionminutos","id"=>"duracionminutos","placeholder"=>"Duración del evento","value"=>$jornadadocente['duracionminutos'],'style'=>'width:500px;')); 
		?>
	</div> 
</div>






 
 <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('jornadadocente','Atras') ?>
<?php echo form_close(); ?>
