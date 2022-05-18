<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('seguimiento/save_edit') ?>
    <ul>
<?php
if(isset($seguimiento))
{
?>
 
        <li> <?php echo anchor('seguimiento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('seguimiento/anterior/'.$seguimiento['idseguimiento'], 'anterior'); ?></li>
        <li> <?php echo anchor('seguimiento/siguiente/'.$seguimiento['idseguimiento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('seguimiento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('seguimiento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('seguimiento/edit/'.$seguimiento['idseguimiento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('seguimiento/delete/'.$seguimiento['idseguimiento'],'Delete'); ?></li>
        <li> <?php echo anchor('seguimiento/listar/','Listar'); ?></li>
        <li> <?php echo anchor('seguimiento/evento/','Evento'); ?></li>
        <li> <?php echo anchor('seguimiento/reporte/'.$seguimiento['idevento'], 'Reporte'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('seguimiento/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$seguimiento['idevento']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de seguimiento:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$seguimiento['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idevento',$seguimiento['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos','style'=>'width:500px;')); 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nomre del evento:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
echo form_input('idevento',$options[$seguimiento['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Persona:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idpersona',$seguimiento['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idseguimientoes','style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
		<?php

$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}
echo form_input('nombre',$options[$seguimiento['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>
 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tipo de seguimiento:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($tiposeguimientos as $row){
	$options[$row->idtiposeguimiento]= $row->nombre;
}
if(!isset($seguimiento['idtiposeguimiento'])){
echo form_input('nombre',"",array("disabled"=>"disabled")) ;
}else{
echo form_input('nombre',$options[$seguimiento['idtiposeguimiento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
}

		?>
	</div> 
</div>



<?php echo form_close(); ?>





</body>









</html>
