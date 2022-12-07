<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($jornadadocente))
{
?>
   <li> <?php echo anchor('jornadadocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('jornadadocente/anterior/'.$jornadadocente['idjornadadocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('jornadadocente/siguiente/'.$jornadadocente['idjornadadocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('jornadadocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('jornadadocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('jornadadocente/edit/'.$jornadadocente['idjornadadocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('jornadadocente/delete/'.$jornadadocente['idjornadadocente'],'Delete'); ?></li>
        <li> <?php echo anchor('jornadadocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('jornadadocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('jornadadocente/save_edit') ?>
<?php echo form_hidden('idjornadadocente',$jornadadocente['idjornadadocente']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">ID JornadaDOCENTE:</label>
	<div class="col-md-10">
		<?php


     echo form_input('idjornadadocente',$jornadadocente['idjornadadocente'],array("disabled"=>"disabled",'placeholder'=>'Idjornadadocentes'));

		?>
	</div> 
</div>
 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura docente:</label>
	<div class="col-md-10">
		<?php
	$options= array("NADA");
	foreach ($asignaturadocentes as $row){
		$options[$row->idasignaturadocente]= $row->elhorariodocente;
	}
echo form_input('idasignaturadocente',$options[$jornadadocente['idasignaturadocente']],array("disabled"=>"disabled",'style'=>'width:500px;'));  

		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura docente:</label>
	<div class="col-md-10">
		<?php
	$options= array("NADA");
	foreach ($asignaturadocentes as $row){
		$options[$row->idasignaturadocente]= $row->laasignatura."-".$row->paralelo;
	}
echo form_input('idasignaturadocente',$options[$jornadadocente['idasignaturadocente']],array("disabled"=>"disabled",'style'=>'width:500px;'));  

		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Dia semana:</label>
	<div class="col-md-10">
		<?php
    $options= array("NADA");
    foreach ($diasemanas as $row){
	      $options[$row->iddiasemana]= $row->nombre;
    }
    echo form_input('iddiasemana',$options[$jornadadocente['iddiasemana']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora inicio:</label>
	<div class="col-md-10">
		<?php
       echo form_input('horainicio',$jornadadocente['horainicio'],array('placeholder'=>'número de sisión','style'=>'width:100px;'));
		?>
	</div> 
</div>

  
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración:</label>
	<div class="col-md-10">
		<?php
       echo form_input('duracionminutos',$jornadadocente['duracionminutos'],array('placeholder'=>'duración en minutos','style'=>'width:100px;'));
		?>
	</div> 
</div>







<?php echo form_close(); ?>





</body>









</html>
