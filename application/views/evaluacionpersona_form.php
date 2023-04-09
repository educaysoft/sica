
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("evaluacionpersona/save") ?>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona  :</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->lapersona;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha  :</label>
	<div class="col-md-10">
		<?php

echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  

		?>
	</div> 
</div>


<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("evaluacionpersona","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

