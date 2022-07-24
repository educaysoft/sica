<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open("requerimiento/save",array('id'=>'eys-form')); ?>

<ul>
    <li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    <li> <?php echo anchor('requerimiento', 'Cancelar'); ?></li>
</ul>

</div>
<br>



<?php echo form_hidden("idrequerimiento")  ?>


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
    <label class="col-md-2 col-form-label"> Estado del requerimiento:</label>
	<div class="col-md-10">
	<?php
    $options= array('--Select--');
    foreach ($estadorequerimientos as $row){
      $options[$row->idestadorequerimiento]= $row->nombre;
    }
     echo form_dropdown("idestadorequerimiento",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 



 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Título del requerimiento:</label>
	<div class="col-md-10">
	<?php

 echo form_input("detallecorto","", array("placeholder"=>"Título del requerimiento",'style'=>'width:500px;')); 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
	<?php
 echo form_input(array("name"=>"fecharequerimiento","id"=>"fecharequerimiento","type"=>"date"));  
		?>
	</div> 
</div> 


 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle del requerimiento:</label>
	<div class="col-md-10">
	<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto" );    
    
 echo form_textarea("detallelargo","", $textarea_options); 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($personas as $row){
		$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
	}	
 	echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  
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
