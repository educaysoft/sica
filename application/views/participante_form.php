
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
  <label class="col-md-2 col-form-label">Participante:</label>
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



<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('participante', 'Cancelar'); ?></li>
	</ul>
</div> 




<?php echo form_close();?>




