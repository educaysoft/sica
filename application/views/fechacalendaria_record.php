<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($fechacalendaria))
{
?>
        <li> <?php echo anchor('fechacalendaria/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('fechacalendaria/siguiente/'.$fechacalendaria['idfechacalendaria'], 'siguiente'); ?></li>
        <li> <?php echo anchor('fechacalendaria/anterior/'.$fechacalendaria['idfechacalendaria'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('fechacalendaria/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('fechacalendaria/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('fechacalendaria/edit/'.$fechacalendaria['idfechacalendaria'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('fechacalendaria/delete/'.$fechacalendaria['idfechacalendaria'],'Delete'); ?></li>
        <li> <?php echo anchor('fechacalendaria/listar/'.$fechacalendaria['idperiodoacademico'],'Listar'); ?></li>
        <li> <?php echo anchor('fechacalendariaunidad/','Unidades'); ?></li>
        <li> <?php echo anchor('fechacalendaria/panel/','Panel'); ?></li>

<?php 
}else{
?>
        <li> <?php echo anchor('fechacalendaria/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('fechacalendaria/save_edit') ?>
<?php echo form_hidden('idfechacalendaria',$fechacalendaria['idfechacalendaria']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idfechacalendaria',$fechacalendaria['idfechacalendaria'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id institucion:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idinstitucion',$fechacalendaria['idinstitucion'],array("disabled"=>"disabled",'placeholder'=>'Idperiodoacademicoes','style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo : ( <?php echo anchor('periodoacademico/actual/'.$fechacalendaria['idperiodoacademico'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->nombrecorto;
	}
	?>
		<?php

    echo form_input('idperiodoacademico',$options[$fechacalendaria['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Actividad :</label>
	<div class="col-md-10">
		<?php
       echo form_input('actividad',$fechacalendaria['actividad'],array('placeholder'=>'Nombre del fechacalendaria','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php
       echo form_input('detalle',$fechacalendaria['detalle'],array('placeholder'=>'Descripción del fechacalendaria','style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha calendaria:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechacalendaria',$fechacalendaria['fechacalendaria'],array('type'=>'date','placeholder'=>'fecha calendaria','style'=>'width:500px;')) 
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
echo form_input('',$options[$fechacalendaria['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<?php echo form_close(); ?>



