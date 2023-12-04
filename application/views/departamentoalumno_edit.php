<?php echo form_open('departamentoalumno/save_edit') ?>
<?php echo form_hidden('iddepartamentoalumno',$departamentoalumno['iddepartamentoalumno']) ?>
<h2> <?php echo $title; ?></h2>
<hr />

 
<div class="form-group row">
    <label class="col-md-2 col-form-label">Id departamento alumno:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'iddepartamentoalumno','value'=>$departamentoalumno['iddepartamentoalumno'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Persona:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($alumnos as $row){
	$options[$row->idalumno]= $row->elalumno;
}

 echo form_dropdown("idalumno",$options, $departamentoalumno['idalumno']);  
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

 echo form_dropdown("iddepartamento",$options, $departamentoalumno['iddepartamento']);  

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

 echo form_dropdown("idperiodoacademico",$options, $departamentoalumno['idperiodoacademico']);  
		?>
	</div> 
</div>

<table>


<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$departamentoalumno['fechadesde'],'placeholder'=>'fechadesde',"type"=>"date")); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('departamentoalumno','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
