<?php echo form_open('tema/save_edit') ?>
<?php echo form_hidden('idtema',$tema['idtema']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombrecorto','value'=>$tema['nombrecorto'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Título" );    
	echo form_textarea('nombrelargo',$tema['nombrelargo'],$textarea_options ); 

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Objetivo aprendizaje:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Título" );    
	echo form_textarea('objetivoaprendizaje',$tema['objetivoaprendizaje'],$textarea_options ); 

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Experiencia(conocimiento previo):</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Título" );    
	echo form_textarea('experiencia',$tema['experiencia'],$textarea_options ); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Reflexion(Arranque):</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Título" );    
	echo form_textarea('reflexion',$tema['reflexion'],$textarea_options ); 

		?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"> Secuencia contenido:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '2', 'id'=>'secuencia',  'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Título" );    
	echo form_textarea('secuencia',$tema['secuencia'],$textarea_options ); 

		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Apendizaje autónomo:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Título" );    
	echo form_textarea('aprendizajeautonomo',$tema['aprendizajeautonomo'],$textarea_options ); 

		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidad silabo:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]= $row->nombre;
}

 echo form_dropdown("idunidadsilabo",$options, $tema['idunidadsilabo']);  
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'duracionminutos','value'=>$tema['duracionminutos'], "style"=>"width:100px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número de sesión:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'numerosesion','value'=>$tema['numerosesion'], "style"=>"width:50px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Video tutorial:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($videotutoriales as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}

 echo form_dropdown("idvideotutorial",$options, $tema['idvideotutorial']);  
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Link presentación:</label>
	<div class="col-md-10">
	<?php
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Link presentacion" );    
	echo form_textarea('linkpresentacion',$tema['linkpresentacion'],$textarea_options ); 
	?>
	</div> 
</div>




 
<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluacion:</label>
<div class="col-md-10">
<?php
     
$options= array('--Select--');
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre;
}

echo form_dropdown("idmodoevaluacion",$options, $tema['idmodoevaluacion']);
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Aula:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($aulas as $row){
	$options[$row->idaula]= $row->nombre;
}
 echo form_dropdown("idaula",$options, $tema['idaula']);  
?>
</div>
</div>



<table>
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tema','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>



<script>
	$(document).ready(()=>{


	 tinymce.init({
		 selector:'#secuencia',
		 height:300

	});
 
	});     



</script>
