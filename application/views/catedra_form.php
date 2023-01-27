<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open("catedra/save",array('id'=>'eys-form')); ?>

<ul>
    <li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    <li> <?php echo anchor('catedra', 'Cancelar'); ?></li>
</ul>

</div>
<br>



<?php echo form_hidden("idcatedra")  ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Institución:</label>
	<div class="col-md-10">
	<?php
    $options= array('--Select--');
    foreach ($instituciones as $row){
      $options[$row->idinstitucion]= $row->nombre;
    }
     echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estado del catedra:</label>
	<div class="col-md-10">
	<?php
    $options= array('--Select--');
    foreach ($catedra_estados as $row){
      $options[$row->idcatedra_estado]= $row->nombre;
    }
     echo form_dropdown("idcatedra_estado",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 



 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Título del catedra:</label>
	<div class="col-md-10">
	<?php

 echo form_input("titulo","", array("placeholder"=>"Título del catedra",'style'=>'width:500px;')); 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
	<?php
 echo form_input(array("name"=>"fechainicia","id"=>"fechainicia","type"=>"date"));  
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha finaliza:</label>
	<div class="col-md-10">
	<?php
 echo form_input(array("name"=>"fechafinaliza","id"=>"fechafinaliza","type"=>"date"));  
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle del catedra:</label>
	<div class="col-md-10">
	<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto" );    
    
 echo form_textarea("detalle","", $textarea_options); 
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Página de inicio:</label>
	<div class="col-md-10">
	<?php
    $options= array('--Select--');
    foreach ($paginas as $row){
      $options[$row->idpagina]= $row->nombre;
    }
     echo form_dropdown("idpagina",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración:</label>
	<div class="col-md-10">
	<?php

 echo form_input("duracion","", array("placeholder"=>"Duración del catedra",'style'=>'width:500px;')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Costo:</label>
	<div class="col-md-10">
	<?php

 echo form_input("costo","", array("placeholder"=>"Costo del catedra",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<?php echo form_close();?>
    
     <script>
    async function cargaarchivo(url)
{

    let formData = new FormData(); 
    formData.append("file", archivopdf.files[0]);
    await fetch(url, {method: "POST", body: formData}); 
  alert('The file has been uploaded successfully.');

};
</script>
