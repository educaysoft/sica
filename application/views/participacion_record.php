<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('participacion/save_edit') ?>
    <ul>
<?php
if(isset($participacion))
{
?>
 
        <li> <?php echo anchor('participacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('participacion/anterior/'.$participacion['idparticipacion'], 'anterior'); ?></li>
        <li> <?php echo anchor('participacion/siguiente/'.$participacion['idparticipacion'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('participacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('participacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('participacion/edit/'.$participacion['idparticipacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('participacion/delete/'.$participacion['idparticipacion'],'Delete'); ?></li>
        <li> <?php echo anchor('participacion/listar/','Listar'); ?></li>
        <li> <?php echo anchor('participacion/evento/','Evento'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('participacion/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$participacion['idevento']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de participacion:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$participacion['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idevento',$participacion['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos','style'=>'width:500px;')); 
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
echo form_input('idevento',$options[$participacion['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Persona:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idpersona',$participacion['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idparticipaciones','style'=>'width:500px;')); 
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
echo form_input('nombre',$options[$participacion['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>
 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tipo de participacion:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($tipoparticipacions as $row){
	$options[$row->idtipoparticipacion]= $row->nombre;
}
if(!isset($participacion['idtipoparticipacion'])){
echo form_input('nombre',"",array("disabled"=>"disabled")) ;
}else{
echo form_input('nombre',$options[$participacion['idtipoparticipacion']],array("disabled"=>"disabled",'style'=>'width:500px;'));
}

		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Porcentaje:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('porcentaje',$participacion['porcentaje'],array('type'=>'date','placeholder'=>'porcentaje','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<?php echo form_close(); ?>





</body>









</html>
