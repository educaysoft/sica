<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('ubicacionproceso/save_edit') ?>
    <ul>
<?php
if(isset($ubicacionproceso))
{
?>
 
        <li> <?php echo anchor('ubicacionproceso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ubicacionproceso/anterior/'.$ubicacionproceso['idubicacionproceso'], 'anterior'); ?></li>
        <li> <?php echo anchor('ubicacionproceso/siguiente/'.$ubicacionproceso['idubicacionproceso'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ubicacionproceso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ubicacionproceso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ubicacionproceso/edit/'.$ubicacionproceso['idubicacionproceso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ubicacionproceso/delete/'.$ubicacionproceso['idubicacionproceso'],'Delete'); ?></li>
        <li> <?php echo anchor('ubicacionproceso/listar/'.$ubicacionproceso['idubicacionproceso'],'Listar'); ?></li>
	<li> <?php echo anchor('ubicacionproceso/reportepdf/'.$ubicacionproceso['idubicacionproceso'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('ubicacionproceso/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$ubicacionproceso['idubicacionproceso']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ubicación: </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$ubicacionproceso['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('proceso/actual/'.$ubicacionproceso['idproceso'], 'El trámite:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($procesos as $row){
	$options[$row->idproceso]= $row->nombre;
}

echo form_input('idproceso',$options[$ubicacionproceso['idproceso']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   Responsable:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$ubicacionproceso['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha llegada:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$ubicacionproceso['fecha'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora llegada:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('hora',$ubicacionproceso['hora'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'hora','style'=>'width:500px;')) 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$ubicacionproceso['detalle'],$textarea_options); 


		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Estado proceso:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($estadoprocesos as $row){
	$options[$row->idestadoproceso]=$row->nombre;
}

echo form_input('idestadoproceso',$options[$ubicacionproceso['idestadoproceso']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>





















<?php echo form_close(); ?>





</body>









</html>
