<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($aspirante))
{
?>
        <li> <?php echo anchor('aspirante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('aspirante/anterior/'.$aspirante['idaspirante'], 'anterior'); ?></li>
        <li> <?php echo anchor('aspirante/siguiente/'.$aspirante['idaspirante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('aspirante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('aspirante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('aspirante/edit/'.$aspirante['idaspirante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('aspirante/delete/'.$aspirante['idaspirante'],'Delete'); ?></li>
        <li> <?php echo anchor('aspirante/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('aspirante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('aspirante/save_edit') ?>
<?php echo form_hidden('idaspirante',$aspirante['idaspirante']) ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Aspirante: </label>
     	<?php 


      echo form_input('idaspirante',$aspirante['idaspirante'],array("disabled"=>"disabled",'placeholder'=>'Idaspirantes')); 
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

echo form_input('idpersona',$options[$aspirante['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> Depart-Carrera: </label>
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$aspirante['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>

  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
     	<?php 


      echo form_input('fechadesde',$aspirante['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
     	<?php 

       echo form_input('fechahasta',$aspirante['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('estudio/add', 'Estudios:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($estudios as $row){
		$options[$row->idpersona]=$row->nivel." - ".$row->lainstitucion;
	}

			 echo form_multiselect('idestudio[]',$options,(array)set_value('idestudio', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>


<?php echo form_close(); ?>





</body>









</html>
