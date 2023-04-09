	




<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("visitante/save",array('id'=>'eys-form')) ?>

<div class="form-group row">
  <label class="col-md-2 col-form-label"> Departamento/Oficina:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 

<div class="form-group row">
  <label class="col-md-2 col-form-label">Visitante (<?php echo anchor('persona/add', 'Nuevo'); ?>):</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}
 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 



<div class="form-group row">
  <label class="col-md-2 col-form-label"> Fecha :</label>
	<div class="col-md-10">
		<?php

   date_default_timezone_set('America/Guayaquil');
    $fecha = date("Y-m-d");
    $horai= date("H:i:s");

	echo form_input(array("name"=>"fecha","id"=>"fecha","readonly"=>"true",  "type"=>"date","value"=>$fecha)); echo $eldia; 
	 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Hora :</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"hora","id"=>"hora","type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"19:00:00" ,"value"=>$hora));   

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Motivo de visita:</label>

<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Motivo de la visita" );    
 echo form_textarea("motivo","", $textarea_options);  

?>
</div>
</div>
















<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('visitante', 'Cancelar'); ?></li>
	</ul>
</div> 




<?php echo form_close();?>






