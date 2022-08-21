
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("docenteasignatura/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Curso:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($cursos as $row){
		$options[$row->idcurso]= $row->nombre;
	}

	 echo form_dropdown("idcurso",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Documento:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($documentoes as $row){
		$options[$row->iddocumento]= $row->asunto;
	}
	 echo form_dropdown("iddocumento",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 


 


 


<table>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("docenteasignatura","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

