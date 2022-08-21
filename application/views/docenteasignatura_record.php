<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('docenteasignatura/save_edit') ?>
    <ul>
<?php
if(isset($docenteasignatura))
{
?>
 
        <li> <?php echo anchor('docenteasignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('docenteasignatura/anterior/'.$docenteasignatura['iddocenteasignatura'], 'anterior'); ?></li>
        <li> <?php echo anchor('docenteasignatura/siguiente/'.$docenteasignatura['iddocenteasignatura'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('docenteasignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('docenteasignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('docenteasignatura/edit/'.$docenteasignatura['iddocenteasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('docenteasignatura/delete/'.$docenteasignatura['iddocenteasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('docenteasignatura/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('docenteasignatura/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idasignatura',$docenteasignatura['idasignatura']) ?>


 




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id asignatura:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idasignatura',$docenteasignatura['idasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idasignaturas','style'=>'width:500px;'));
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
echo form_input('idasignatura',$options[$docenteasignatura['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id docente:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocente',$docenteasignatura['iddocente'],array("disabled"=>"disabled",'placeholder'=>'Iddocenteasignaturaes','style'=>'width:500px;'));
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
echo form_input('nombre',$options[$docenteasignatura['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;'));
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
echo form_input('idperiodoacademico',$options[$docenteasignatura['iperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
