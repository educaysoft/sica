<?php echo form_open('calendarioacademico/save_edit') ?>
<?php echo form_hidden('idcalendarioacademico',$calendarioacademico['idcalendarioacademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombrecorto','value'=>$calendarioacademico['nombrecorto'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombrelargo','value'=>$calendarioacademico['nombrelargo'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidad silabo:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]= $row->nombre;
}

 echo form_dropdown("idunidadsilabo",$options, $calendarioacademico['idunidadsilabo']);  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha impartida:</label>
	<div class="col-md-10">

      <?php echo form_input( array("name"=>'fechaimpartida',"id"=>'fechaimpartida',"value"=>$calendarioacademico['fechaimpartida'],'type'=>'date','placeholder'=>'fecha impartida'));

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'duracionminutos','value'=>$calendarioacademico['duracionminutos'], "style"=>"width:100px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número de sesión:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'numerosesion','value'=>$calendarioacademico['numerosesion'], "style"=>"width:50px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Video tutorial:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($videotutoriales as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}

 echo form_dropdown("idvideotutorial",$options, $calendarioacademico['idvideotutorial']);  
		?>
	</div> 
</div>


 








 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('calendarioacademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
