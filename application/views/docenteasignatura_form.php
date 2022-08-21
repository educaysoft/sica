
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("docenteasignatura/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($asignaturas as $row){
		$options[$row->idasignatura]= $row->nombre;
	}

	 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($docentes as $row){
		$options[$row->iddocente]= $row->asunto;
	}
	 echo form_dropdown("iddocente",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Perido académico:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]= $row->nombrecorto;
	}
	 echo form_dropdown("idperiodoacademico",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div>


 


<table>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("docenteasignatura","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

