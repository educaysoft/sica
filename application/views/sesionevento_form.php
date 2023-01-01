
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("sesionevento/save") ?>


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
<label class="col-md-2 col-form-label">Fecha de la sesión:</label>
<div class="col-md-10">
<?php

   date_default_timezone_set('America/Guayaquil');
    $date = date("Y-m-d");
    $horai= date("H:i:s");
    

    $horaf= date("H:i:s",strtotime(' + 2 hours'));

 echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date","value"=>$date));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema programado:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->numerosesion]=$row->unidad." - ".$row->numerosesion." - ".$row->nombrecorto;
}
 echo form_dropdown("idtema",$options,$date, array('id'=>'idtema'));  
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
<label class="col-md-2 col-form-label">Ponderacion:</label>
<div class="col-md-10">
<?php

 echo form_input("ponderacion","", array("placeholder"=>"Ponderacion"));

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Hora inicio:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horainicio","id"=>"horainicio","type"=>"time","value"=>$horai));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Hora fin:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horafin","id"=>"horafin","type"=>"time","value"=>$horaf));  

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluación:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre;
}

 echo form_dropdown("idmodoevaluacion",$options, set_select('--Select--','default_value'),array('id'=>'idmodoevaluacion'));  
?>
</div>
</div>




<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("sesionevento","Atrás") ?> </td>
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
