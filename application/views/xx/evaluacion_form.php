<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("evaluacion/save") ?>
<?php echo form_hidden("idevaluacion")  ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php

 echo form_input("nombre","", array("placeholder"=>"Nombre de la Evaluacion","style"=>"width:500px")); 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle de la evaluación" );    
 echo form_textarea("detalle","", $textarea_options);
		?>
	</div> 
</div> 


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


<table>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("evaluacion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

