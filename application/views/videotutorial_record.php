<html>


<body>

<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
        <li> <?php echo anchor('videotutorial/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('videotutorial/anterior/'.$videotutorial['idvideotutorial'], 'anterior'); ?></li>
        <li> <?php echo anchor('videotutorial/siguiente/'.$videotutorial['idvideotutorial'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('videotutorial/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('videotutorial/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('videotutorial/edit/'.$videotutorial['idvideotutorial'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('videotutorial/delete/'.$videotutorial['idvideotutorial'],'Delete'); ?></li>
        <li> <?php echo anchor('videotutorial/listar/','Listar'); ?></li>
    </ul>
</div>
<br>
<br>


<?php echo form_open('videotutorial/save_edit') ?>
<?php echo form_hidden('idvideotutorial',$videotutorial['idvideotutorial']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Instructor:</label>
	<div class="col-md-10">
	<?php
	$options= array("NADA");
	foreach ($instructores as $row){
		$options[$row->idinstructor]= $row->elinstructor;
	}
echo form_input('idinstructor',$options[$videotutorial['idinstructor']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
	<?php
     echo form_input('idvideotutorial',$videotutorial['idvideotutorial'],array("disabled"=>"disabled",'placeholder'=>'Idvideotutorials','style'=>'width:500px;')); 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Nombre:</label>
	<div class="col-md-10">
	<?php

       echo form_input('nombre',$videotutorial['nombre'],array("disabled"=>"disabled",'placeholder'=>'Nombre del videotutorial','style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Duración:</label>
	<div class="col-md-10">
	<?php
       echo form_input('duracion',$videotutorial['duracion'],array('placeholder'=>'Duracion del videotutorial','style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Enlace:</label>
	<div class="col-md-10">
	<?php
       		echo form_textarea('enlace',$videotutorial['enlace'],array("disabled"=>"disabled",'placeholder'=>'Enlace para compartir','style'=>'width:500px;'));
	?>
	</div> 
</div> 




<div class="form-group row">
    <label class="col-md-2 col-form-label">Evaluación:</label>
	<div class="col-md-10">
	<?php
	$options= array("NADA");
	foreach ($reactivos as $row){
		$options[$row->idreactivo]= $row->nombre;
	}
	echo form_input('idreactivo',$options[$videotutorial['idreactivo']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



   
   

<?php echo form_close(); ?>





</body>









</html>
