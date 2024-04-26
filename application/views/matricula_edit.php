<?php echo form_open('matricula/save_edit') ?>
<?php echo form_hidden('idmatricula',$matricula['idmatricula']) ?>
<h2> <?php echo $title; ?></h2>
<hr />

 
<div class="form-group row">
    <label class="col-md-2 col-form-label">Id departamento estudiante:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'idmatricula','value'=>$matricula['idmatricula'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Persona:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}

 echo form_dropdown("idestudiante",$options, $matricula['idestudiante']);  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Departamento:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $matricula['iddepartamento']);  

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo académico:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown("idperiodoacademico",$options, $matricula['idperiodoacademico']);  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tipo matricula:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($tipomatriculas as $row){
	$options[$row->idtipomatricula]= $row->nombre;
}

 echo form_dropdown("idtipomatricula",$options, $matricula['idtipomatricula']);  
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Repeticion:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($nivelacademicos as $row){
	$options[$row->idnivelacademico]= $row->nombre;
}

 echo form_dropdown("idnivelacademico",$options, $matricula['idnivelacademico']);  
		?>
	</div> 
</div>





<table>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('matricula','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
