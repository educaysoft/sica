<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('pagoevento/save_edit') ?>
    <ul>
<?php
if(isset($pagoevento))
{
?>
 
        <li> <?php echo anchor('pagoevento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('pagoevento/anterior/'.$pagoevento['idpagoevento'], 'anterior'); ?></li>
        <li> <?php echo anchor('pagoevento/siguiente/'.$pagoevento['idpagoevento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('pagoevento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('pagoevento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('pagoevento/edit/'.$pagoevento['idpagoevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('pagoevento/delete/'.$pagoevento['idpagoevento'],'Delete'); ?></li>
        <li> <?php echo anchor('pagoevento/listar/','Listar'); ?></li>
        <li> <?php echo anchor('pagoevento/evento/','Evento'); ?></li>
        <li> <?php echo anchor('pagoevento/reporte/'.$pagoevento['idevento'], 'Reporte'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('pagoevento/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idpagoevento',$pagoevento['idpagoevento']) ?>
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id pagoevento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idpagoevento',$pagoevento['idpagoevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos','style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha pagoevento:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$pagoevento['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idevento',$pagoevento['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos','style'=>'width:500px;')); 
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
echo form_input('idevento',$options[$pagoevento['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Persona:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idpersona',$pagoevento['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idpagoeventoes','style'=>'width:500px;')); 
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
echo form_input('nombre',$options[$pagoevento['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>
 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tipo de pagoevento:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($tipopagoeventos as $row){
	$options[$row->idtipopagoevento]= $row->nombre;
}
if(!isset($pagoevento['idtipopagoevento'])){
echo form_input('nombre',"",array("disabled"=>"disabled")) ;
}else{
echo form_input('nombre',$options[$pagoevento['idtipopagoevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
}

		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> %Participacióm:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('porcentaje',$pagoevento['porcentaje'],array('type'=>'text','placeholder'=>'porcentaje','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> %Ayuda:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('ayuda',$pagoevento['ayuda'],array('type'=>'text','placeholder'=>'ayuda','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<?php echo form_close(); ?>





</body>









</html>
