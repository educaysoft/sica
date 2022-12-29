<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($fechacalendario))
{
?>
        <li> <?php echo anchor('fechacalendario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('fechacalendario/siguiente/'.$fechacalendario['idfechacalendario'], 'siguiente'); ?></li>
        <li> <?php echo anchor('fechacalendario/anterior/'.$fechacalendario['idfechacalendario'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('fechacalendario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('fechacalendario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('fechacalendario/edit/'.$fechacalendario['idfechacalendario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('fechacalendario/delete/'.$fechacalendario['idfechacalendario'],'Delete'); ?></li>
        <li> <?php echo anchor('fechacalendario/listar/'.$fechacalendario['idperiodoacademico'],'Listar'); ?></li>
        <li> <?php echo anchor('fechacalendariounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('fechacalendario/panel/','Panel'); ?></li>

<?php 
}else{
?>
        <li> <?php echo anchor('fechacalendario/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('fechacalendario/save_edit') ?>
<?php echo form_hidden('idfechacalendario',$fechacalendario['idfechacalendario']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idfechacalendario',$fechacalendario['idfechacalendario'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id institucion:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idinstitucion',$fechacalendario['idinstitucion'],array("disabled"=>"disabled",'placeholder'=>'Idperiodoacademicoes','style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo : ( <?php echo anchor('periodoacademico/actual/'.$fechacalendario['idperiodoacademico'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->nombrecorto;
	}
	?>
		<?php

    echo form_input('idperiodoacademico',$options[$fechacalendario['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Actividad :</label>
	<div class="col-md-10">
		<?php
       echo form_input('actividad',$fechacalendario['actividad'],array('placeholder'=>'Nombre del fechacalendario','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php
       echo form_input('detalle',$fechacalendario['detalle'],array('placeholder'=>'Descripción del fechacalendario','style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha calendaria:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechacalendario',$fechacalendario['fechacalendario'],array('type'=>'date','placeholder'=>'fecha calendaria','style'=>'width:500px;')) 
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
echo form_input('',$options[$fechacalendario['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<?php echo form_close(); ?>



