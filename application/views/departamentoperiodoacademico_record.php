<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('departamentoperiodoacademico/save_edit') ?>
    <ul>
<?php
if(isset($departamentoperiodoacademico))
{
?>
 
        <li> <?php echo anchor('departamentoperiodoacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/anterior/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'], 'anterior'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/siguiente/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('departamentoperiodoacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/edit/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('departamentoperiodoacademico/delete/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('departamentoperiodoacademico/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idasignatura',$departamentoperiodoacademico['idasignatura']) ?>


 




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id asignatura:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idasignatura',$departamentoperiodoacademico['idasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idasignaturas','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del asignatura:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}
echo form_input('idasignatura',$options[$departamentoperiodoacademico['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id docente:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocente',$departamentoperiodoacademico['iddocente'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentoperiodoacademicoes','style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Docente:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}
echo form_input('nombre',$options[$departamentoperiodoacademico['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 
 
  


<div class="form-group row">
    <label class="col-md-2 col-form-label">Periodo académico:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}
echo form_input('idperiodoacademico',$options[$departamentoperiodoacademico['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
