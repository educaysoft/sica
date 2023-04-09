
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("ubicacionproceso/save") ?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Articulo: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($procesos as $row){
	$options[$row->idproceso]= $row->nombre;
}

 echo form_dropdown("idproceso",$options, set_select('--Select--','default_value'),array('id'=>'idproceso'));  
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">persona:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos." - ".$row->nombres;
}
 echo form_dropdown("idpersona",$options,set_select('--Select--','default_value'), array('id'=>'idpersona'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Unidad:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]=$row->nombre;
}
 echo form_dropdown("iddepartamento",$options,set_select('--Select--','default_value'), array('id'=>'iddepartamento'));  
?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha de ubicación:</label>
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
<label class="col-md-2 col-form-label">Hora de ubicación:</label>
<div class="col-md-10">
<?php
     $eys_arrinput=array('name'=>'hora','id'=>'hora',"type"=>"time",'value'=>$horai, "style"=>"width:500px");
     echo form_input($eys_arrinput); 

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle:</label>
<div class="col-md-10">
<?php
  
$textarea_options = array("name"=>"detalle","id"=>"detalle",'class' => 'form-control','rows' => '4','cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle","value"=>"");    
echo form_textarea($textarea_options ); 

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">estadoproceso:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($estadoprocesos as $row){
	$options[$row->idestadoproceso]=$row->nombre;
}
 echo form_dropdown("idestadoproceso",$options,set_select('--Select--','default_value'), array('id'=>'idestadoproceso'));  
?>
</div>
</div>




<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("ubicacionproceso","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

<script>

	$(document).ready(()=>{
	  var idproceso= <?php echo $idproceso; ?>;
	  if(idproceso>0){
		    $('#idproceso option[value="'+idproceso+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     



</script>
