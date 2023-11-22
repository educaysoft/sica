<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("alumno/save") ?>
<?php echo form_hidden("idalumno")  ?>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
	<?php

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>













<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("alumno","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

