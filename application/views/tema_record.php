<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tema))
{
?>
        <li> <?php echo anchor('tema/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tema/siguiente/'.$tema['idtema'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tema/anterior/'.$tema['idtema'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tema/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tema/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tema/edit/'.$tema['idtema'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tema/quitar/'.$tema['idtema'],'Quitar'); ?></li>
        <li> <?php echo anchor('tema/listar/'.$tema['idunidadsilabo'],'Listar'); ?></li>
        <li> <?php echo anchor('temaunidad/','Unidades'); ?></li>
        <li> <?php echo anchor('tema/panel/','Panel'); ?></li>
        <li> <?php echo anchor('tema/reportepdf/'.$tema['idtema'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tema/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tema/save_edit') ?>
<?php echo form_hidden('idtema',$tema['idtema']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idtema',$tema['idtema'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php


       echo form_input('nombrecorto',$tema['nombrecorto'],array('placeholder'=>'Nombre del tema','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('nombrelargo',$tema['nombrelargo'],$textarea_options);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Objetivo aprendizaje:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('objetivoaprendizaje',$tema['objetivoaprendizaje'],$textarea_options);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Experiencia(conocimiento previo):</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('experiencia',$tema['experiencia'],$textarea_options);
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Reflexión(arranque):</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('reflexion',$tema['reflexion'],$textarea_options);
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Secuencia contenidos:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4', 'id'=>'secuencia',  'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('secuencia',$tema['secuencia'],$textarea_options);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Aprendizaje autonomo:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('aprendizajeautonomo',$tema['aprendizajeautonomo'],$textarea_options);
		?>
	</div> 
</div>








   

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidad del silabo: ( <?php echo anchor('unidadsilabo/actual/'.$tema['idunidadsilabo'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($unidadsilabos as $row){
		$options[$row->idunidadsilabo]=$row->nombre." - ".$row->launidad;
	}
	?>
		<?php

    echo form_input('idunidadsilabo',$options[$tema['idunidadsilabo']],array("disabled"=>"disabled",'style'=>'width:600px;')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número de sesión:</label>
	<div class="col-md-10">
		<?php
       echo form_input('numerosesion',$tema['numerosesion'],array('placeholder'=>'número de sisión','style'=>'width:50px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
	<div class="col-md-10">
		<?php
       echo form_input('duracionminutos',$tema['duracionminutos'],array('placeholder'=>'duracion minutos','style'=>'width:100px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('metodoaprendizajetema/add/'.$tema['idtema'], 'Metodo:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($metodoaprendizajetemas as $row){
		$options[$row->idmetodoaprendizajetema]=$row->elmetodo;
	}
 echo form_multiselect('metodoaprendizajetema[]',$options,(array)set_value('idmetodoaprendizajetema', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id videotutorial:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idvideotutorial',$tema['idvideotutorial'],array("disabled"=>"disabled",'placeholder'=>'Idunidadsilaboes','style'=>'width:500px;'));
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
echo form_input('nombre',$options[$tema['idvideotutorial']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Link presentación:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('linkpresentacion',$tema['linkpresentacion'],$textarea_options);
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Modo de evaluación: </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->ponderacion." - ".$row->nombre;
}

echo form_input('idmodoevaluacion',$options[$tema['idmodoevaluacion']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<?php echo form_close(); ?>

<script>

$(document).ready(function(){


	 tinymce.init({
		 selector:'#secuencia',
			 height :300,
			readonly: true,
  toolbar: false,
  menubar: false,
  statusbar: false

	});
});
</script>



