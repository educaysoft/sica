<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($calendarioacademico))
{
?>
        <li> <?php echo anchor('calendarioacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('calendarioacademico/siguiente/'.$calendarioacademico['idcalendarioacademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('calendarioacademico/anterior/'.$calendarioacademico['idcalendarioacademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('calendarioacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('calendarioacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('calendarioacademico/edit/'.$calendarioacademico['idcalendarioacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('calendarioacademico/delete/'.$calendarioacademico['idcalendarioacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('calendarioacademico/listar/'.$calendarioacademico['idperiodoacademico'],'Listar'); ?></li>
        <li> <?php echo anchor('calendarioacademicounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('calendarioacademico/panel/','Panel'); ?></li>

<?php 
}else{
?>
        <li> <?php echo anchor('calendarioacademico/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('calendarioacademico/save_edit') ?>
<?php echo form_hidden('idcalendarioacademico',$calendarioacademico['idcalendarioacademico']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idcalendarioacademico',$calendarioacademico['idcalendarioacademico'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id institucion:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idinstitucion',$calendarioacademico['idinstitucion'],array("disabled"=>"disabled",'placeholder'=>'Idperiodoacademicoes','style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo : ( <?php echo anchor('periodoacademico/actual/'.$calendarioacademico['idperiodoacademico'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->nombrecorto;
	}
	?>
		<?php

    echo form_input('idperiodoacademico',$options[$calendarioacademico['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Actividad :</label>
	<div class="col-md-10">
		<?php
       echo form_input('actividad',$calendarioacademico['actividad'],array('placeholder'=>'Nombre del calendarioacademico','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php
       echo form_input('detalle',$calendarioacademico['detalle'],array('placeholder'=>'Descripción del calendarioacademico','style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha calendaria:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('calendarioacademico',$calendarioacademico['calendarioacademico'],array('type'=>'date','placeholder'=>'fecha calendaria','style'=>'width:500px;')) 
		?>
	</div> 
</div>
















<div class="form-group row">
    <label class="col-md-2 col-form-label">Institucion:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}
echo form_input('',$options[$calendarioacademico['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<?php echo form_close(); ?>



