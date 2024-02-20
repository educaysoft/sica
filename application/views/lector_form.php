
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("lector/save") ?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Asunto:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, set_select('--Select--','default_value'));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Lector:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos.' '.$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value')); 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle",'id'=>'detalle' );    
 echo form_textarea("detalle","", $textarea_options); 
?>
</div>
</div>



<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("lector","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

