<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estudiante))
{
?>
        <li> <?php echo anchor('estudiante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estudiante/anterior/'.$estudiante['idestudiante'], 'anterior'); ?></li>
        <li> <?php echo anchor('estudiante/siguiente/'.$estudiante['idestudiante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estudiante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estudiante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estudiante/edit/'.$estudiante['idestudiante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estudiante/delete/'.$estudiante['idestudiante'],'Delete'); ?></li>
        <li> <?php echo anchor('estudiante/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estudiante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('estudiante/save_edit') ?>
<?php echo form_hidden('idestudiante',$estudiante['idestudiante']) ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estudiante: </label>
     	<?php 


      echo form_input('idestudiante',$estudiante['idestudiante'],array("disabled"=>"disabled",'placeholder'=>'Idestudiantes')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona: </label>
     	<?php 


 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$estudiante['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Departamento/Carrera: </label>
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$estudiante['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>

  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
     	<?php 


      echo form_input('fechadesde',$estudiante['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
     	<?php 

       echo form_input('fechahasta',$estudiante['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('estudio/add', 'Estudios:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($estudios as $row){
		$options[$row->idpersona]=$row->lainstitucion;
	}

			 echo form_multiselect('idestudio[]',$options,(array)set_value('idestudio', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>


<?php echo form_close(); ?>





</body>









</html>
