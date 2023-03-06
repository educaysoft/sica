
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("ubicaciontramite/save") ?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Articulo: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($tramites as $row){
	$options[$row->idtramite]= $row->nombre;
}

 echo form_dropdown("idtramite",$options, set_select('--Select--','default_value'),array('id'=>'idtramite'));  
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
foreach ($unidades as $row){
	$options[$row->idunidad]=$row->nombre;
}
 echo form_dropdown("idunidad",$options,set_select('--Select--','default_value'), array('id'=>'idunidad'));  
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





<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("ubicaciontramite","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

<script>

	$(document).ready(()=>{
	  var idtramite= <?php echo $idtramite; ?>;
	  if(idtramite>0){
		    $('#idtramite option[value="'+idtramite+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     



</script>
