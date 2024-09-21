
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("seguimientosilabo/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Evento:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($eventos as $row){
		$options[$row->idevento]= $row->titulo;
	}

	 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Criterio Seguimiento:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($criterioseguimientosilabos as $row){
		$options[$row->idcriterioseguimientosilabo]= $row->nombre;
	}

	 echo form_dropdown("idcriterioseguimientosilabo",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Valor criterio:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($valorcriterioseguimientosilabos as $row){
		$options[$row->idvalorcriterioseguimientosilabo]= $row->nombre;
	}

	 echo form_dropdown("idvalorcriterioseguimientosilabo",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>


 


 


<table>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("seguimientosilabo","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

