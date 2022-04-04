
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("cursounidad/save") ?>


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
    <label class="col-md-2 col-form-label"> Videotutorial:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($videotutoriales as $row){
		$options[$row->idvideotutorial]= $row->nombre;
	}
	 echo form_dropdown("idvideotutorial",$options, set_select('--Select--','default_value')); 
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
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("cursounidad","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

