
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("unidadsilabo/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Silabo:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($silabos as $row){
		$options[$row->idsilabo]= $row->nombre;
	}

	 echo form_dropdown("idsilabo",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 



 


<div class="form-group row">
    <label class="col-md-2 col-form-label">No de la unidad:</label>
	<div class="col-md-10">
	<?php
	 echo form_input(array("name"=>"unidad","id"=>"unidad"));  
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Nombre de la unidad:</label>
	<div class="col-md-10">
	<?php
	echo form_input(array("name"=>"nombre","id"=>"nombre"));  
		?>
	</div> 
</div> 


<table>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("unidadsilabo","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

