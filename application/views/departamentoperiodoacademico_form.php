
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("departamentoperiodoacademico/save") ?>


 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Departamento:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($departamentos as $row){
		$options[$row->iddepartamento]= $row->nombre;
	}
	 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value')); 
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
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("departamentoperiodoacademico","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

