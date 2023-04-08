
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("visitante/save",array('id'=>'eys-form')) ?>

<div class="form-group row">
  <label class="col-md-2 col-form-label"> Evento:</label>
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
  <label class="col-md-2 col-form-label">Estado de participacion (<?php echo anchor('visitanteestado/add', 'Nuevo'); ?>):</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($visitanteestado as $row){
	$options[$row->idvisitanteestado]= $row->nombre;
}
 echo form_dropdown("idvisitanteestado",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 



<div class="form-group row">
  <label class="col-md-2 col-form-label">Nivel de participacion (<?php echo anchor('nivelvisitante/add', 'Nuevo'); ?>):</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($nivelvisitante as $row){
	$options[$row->idnivelvisitante]= $row->nombre;
}

 echo form_dropdown("idnivelvisitante",$options,set_select('--Select--','default_value'));  

		?>
	</div> 
</div> 



<div class="form-group row">
  <label class="col-md-2 col-form-label">Grupo</label>
	<div class="col-md-10">
		<?php
	$eys_arrinput=array('name'=>'grupoletra','value'=>'A', "style"=>"width:500px");
	echo form_input($eys_arrinput); 
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




