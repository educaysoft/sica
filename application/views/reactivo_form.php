<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("reactivo/save") ?>
<?php echo form_hidden("idreactivo")  ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php

 echo form_input("nombre","", array("placeholder"=>"Nombre de la Reactivo","style"=>"width:500px")); 
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
    <label class="col-md-2 col-form-label"> Asignatura:</label>
	<div class="col-md-10">
		<?php
		$options= array('--Select--');
		foreach ($asignaturas as $row){
			$options[$row->idasignatura]=$row->area." - ".$row->nivel." - ".$row->nombre;
		}

 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));
		?>
	</div> 
</div> 


<table>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("reactivo","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

