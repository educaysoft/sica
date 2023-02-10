<?php echo form_open('calendarioacademico/save_edit') ?>
<?php echo form_hidden('idcalendarioacademico',$calendarioacademico['idcalendarioacademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Institución:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $calendarioacademico['iddepartamento']);  
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo académico:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown("idperiodoacademico",$options, $calendarioacademico['idperiodoacademico']);  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombre','value'=>$calendarioacademico['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fechadesde:</label>
	<div class="col-md-10">
		<?php
      echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$calendarioacademico['fechadesde'],'type'=>'date','placeholder'=>'fecha')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fechahasta:</label>
	<div class="col-md-10">
		<?php
      echo form_input( array("name"=>'fechahasta',"id"=>'fechahasta',"value"=>$calendarioacademico['fechahasta'],'type'=>'date','placeholder'=>'fecha')); 
		?>
	</div> 
</div>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('calendarioacademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
