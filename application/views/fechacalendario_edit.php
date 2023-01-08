<?php echo form_open('fechacalendario/save_edit') ?>
<?php echo form_hidden('idfechacalendario',$fechacalendario['idfechacalendario']) ?>
<h2> <?php echo $title; ?></h2>
<hr />

<div class="form-group row">
    <label class="col-md-2 col-form-label"> idfechacalendario:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'idfechacalendario','value'=>$fechacalendario['idfechacalendario'], "style"=>"width:100px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha :</label>
	<div class="col-md-10">

      <?php echo form_input( array("name"=>'fechacalendario',"id"=>'fechacalendario',"value"=>$fechacalendario['fechacalendario'],'type'=>'date','placeholder'=>'fecha calendaria'));

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Actividad:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'actividad','value'=>$fechacalendario['actividad'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> detalle:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'detalle','value'=>$fechacalendario['detalle'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Calendario académico:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($calendarioacademicos as $row){
	$options[$row->idcalendarioacademico]= $row->elcalendarioacademico;
}

 echo form_dropdown("idcalendarioacademico",$options, $fechacalendario['idcalendarioacademico']);  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hito:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'hito','value'=>$fechacalendario['hito'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>












 








 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('fechacalendario','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
