<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('cursodocumento/save_edit') ?>
    <ul>
<?php
if(isset($cursodocumento))
{
?>
 
        <li> <?php echo anchor('cursodocumento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('cursodocumento/anterior/'.$cursodocumento['idcursodocumento'], 'anterior'); ?></li>
        <li> <?php echo anchor('cursodocumento/siguiente/'.$cursodocumento['idcursodocumento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('cursodocumento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('cursodocumento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('cursodocumento/edit/'.$cursodocumento['idcursodocumento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('cursodocumento/delete/'.$cursodocumento['idcursodocumento'],'Delete'); ?></li>
        <li> <?php echo anchor('cursodocumento/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('cursodocumento/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idcurso',$cursodocumento['idcurso']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> No. de la unidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('unidad',$cursodocumento['unidad'],array("disabled"=>"disabled",'placeholder'=>'unidad','style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
      echo form_input('nombre',$cursodocumento['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre','style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id curso:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idcurso',$cursodocumento['idcurso'],array("disabled"=>"disabled",'placeholder'=>'Idcursos','style'=>'width:500px;'));
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
echo form_input('idcurso',$options[$cursodocumento['idcurso']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id videotutorial:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idvideotutorial',$cursodocumento['idvideotutorial'],array("disabled"=>"disabled",'placeholder'=>'Idcursodocumentoes','style'=>'width:500px;'));
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
echo form_input('nombre',$options[$cursodocumento['idvideotutorial']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 
 
  








<?php echo form_close(); ?>





</body>









</html>
