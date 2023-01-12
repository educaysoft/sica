
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("sesionevento/save") ?>


<div class="form-group row">
<label class="col-md-2 col-form-label"><?php echo anchor('evento/actual/'.$idevento, 'Evento:'); ?> </label>
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

 echo form_input(array("name"=>"fecha","id"=>"fecha","readonly"=>"false", "type"=>"date","value"=>$date));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema dictados:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->idtema]="Unidad: ".$row->unidad." - Sesion: ".$row->numerosesion." - ".$row->nombrecorto;
}
 echo form_dropdown("idtema",$options,$date, array('id'=>'idtema'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Unidad:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]="Unidad: ".$row->unidad;
}
 echo form_dropdown("idunidadsilabo",$options,$date, array('id'=>'idunidadsilabo'));  
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Número de sesión:</label>
<div class="col-md-10">
<?php
 //print_r($sesionevento);
 echo form_input("numerosesion",$sesionevento[0]->nsesion+1, array("readonly"=>"true","placeholder"=>"Numero de sesion"));

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema nombre(corto):</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Descripción corta del tema" );    
 echo form_textarea("temacorto","", $textarea_options);  

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Tema descripción:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Descripción larga del tema" );    
 echo form_textarea("tema","", $textarea_options);  

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

 echo form_input(array("name"=>"horainicio","id"=>"horainicio","readonly"=>"true","type"=>"time","value"=>$horai));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Hora fin:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horafin","id"=>"horafin","readonly"=>"true",   "type"=>"time","value"=>$horaf));  

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
