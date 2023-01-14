<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignatura/save") ?>
<?php echo form_hidden("idasignatura")  ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Código:</label>
	<div class="col-md-10">
<?php echo form_input("codigo","", array("placeholder"=>"Código"));

		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
<?php
echo form_input("nombre","", array("placeholder"=>"Nombre de la artículo"));
		?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"> Malla:</label>
	<div class="col-md-10">
<?php 

$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]= $row->nombrecorto;
}
 echo form_dropdown("idmalla",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Área conocimiento:</label>
	<div class="col-md-10">
<?php 

$options= array('--Select--');
foreach ($areaconocimientos as $row){
	$options[$row->idareaconocimiento]= $row->nombre;
}
 echo form_dropdown("idareaconocimiento",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nivel:</label>
	<div class="col-md-10">
<?php 

$options= array('--Select--');
foreach ($nivelacademicos as $row){
	$options[$row->idnivelacademico]= $row->nombre;
}
 echo form_dropdown("idnivelacademico",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Créditos:</label>
	<div class="col-md-10">
<?php 
       echo form_input('creditos',"",array('placeholder'=>'creditos de la asignatura'));
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Resultados de aprendizaje:</label>
	<div class="col-md-10">
	<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"resultados de apendizaje" );    
    
 echo form_textarea("resultadosaprendizaje","", $textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Contenidos mínimos:</label>
	<div class="col-md-10">
	<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"resultados de apendizaje" );    
    
 echo form_textarea("contenidosminimos","", $textarea_options); 
		?>
	</div> 
</div>



<div class="form-group row">
	<div class="col-md-10">
<?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignatura","Atras");

		?>
	</div> 
</div>




<?php echo form_close();?>

