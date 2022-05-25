
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("fechaevento/save") ?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('id'=>'idevento'));  
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha de evento:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Tema a tratar:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    
 echo form_textarea("tema","", $textarea_options);  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema nombre(corto):</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    
 echo form_textarea("temacorto","", $textarea_options);  

?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo(1.eval 2 parti):</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    
 echo form_textarea("tipo","", $textarea_options);  

?>
</div>
</div>



<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("fechaevento","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

<script>

	$(document).ready(()=>{
	  var idevento= <?php echo $idevento; ?>;
	  if(idevento>0){
		    $('#idevento option[value="'+idevento+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     



</script>
