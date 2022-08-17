<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('cursounidad/save_edit') ?>
    <ul>
<?php
if(isset($cursounidad))
{
?>
 
        <li> <?php echo anchor('cursounidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('cursounidad/anterior/'.$cursounidad['idcursounidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('cursounidad/siguiente/'.$cursounidad['idcursounidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('cursounidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('cursounidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('cursounidad/edit/'.$cursounidad['idcursounidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('cursounidad/delete/'.$cursounidad['idcursounidad'],'Delete'); ?></li>
        <li> <?php echo anchor('cursounidad/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('cursounidad/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idcurso',$cursounidad['idcurso']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> No. de la unidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('unidad',$cursounidad['unidad'],array("disabled"=>"disabled",'placeholder'=>'unidad','style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
      echo form_input('nombre',$cursounidad['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre','style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id curso:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idcurso',$cursounidad['idcurso'],array("disabled"=>"disabled",'placeholder'=>'Idcursos','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del curso:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($cursos as $row){
	$options[$row->idcurso]= $row->nombre;
}
echo form_input('idcurso',$options[$cursounidad['idcurso']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id videotutorial:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idvideotutorial',$cursounidad['idvideotutorial'],array("disabled"=>"disabled",'placeholder'=>'Idcursounidades','style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Videotutorial:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($videotutoriales as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}
echo form_input('nombre',$options[$cursounidad['idvideotutorial']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 
 
  








<?php echo form_close(); ?>





</body>









</html>
