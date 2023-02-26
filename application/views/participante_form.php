
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("participante/save",array('id'=>'eys-form')) ?>

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

<div class="form-group row">
  <label class="col-md-2 col-form-label">Participante (<?php echo anchor('persona/add', 'Nuevo'); ?>):</label>
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
  <label class="col-md-2 col-form-label">Estado de participacion (<?php echo anchor('participanteestado/add', 'Nuevo'); ?>):</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($participanteestado as $row){
	$options[$row->idparticipanteestado]= $row->nombre;
}
 echo form_dropdown("idparticipanteestado",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 



<div class="form-group row">
  <label class="col-md-2 col-form-label">Nivel de participacion (<?php echo anchor('nivelparticipante/add', 'Nuevo'); ?>):</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($nivelparticipante as $row){
	$options[$row->idnivelparticipante]= $row->nombre;
}

 echo form_dropdown("idnivelparticipante",$options,set_select('--Select--','default_value'));  

		?>
	</div> 
</div> 



<div class="form-group row">
  <label class="col-md-2 col-form-label">Grupo</label>
	<div class="col-md-10">
		<?php
	$eys_arrinput=array('name'=>'grupoletra','value'=>$participante['grupoletra'], "style"=>"width:500px");
	echo form_input($eys_arrinput); 
		?>
	</div> 
</div> 



<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('participante', 'Cancelar'); ?></li>
	</ul>
</div> 




<?php echo form_close();?>




