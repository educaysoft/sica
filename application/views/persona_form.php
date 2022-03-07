<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("persona/save", array('id'=>'eys-form')); ?>
<?php echo form_hidden("idpersona")  ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Cédula:</label>
	<div class="col-md-10">
		<?php
		 echo form_input("cedula","", array("placeholder"=>"Cedula"));  
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombres :</label>
	<div class="col-md-10">
		<?php
 		echo form_input("nombres","", array("placeholder"=>"Nombres")); 
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Apellidos :</label>
	<div class="col-md-10">
		<?php
 echo form_input("apellidos","", array("placeholder"=>"Apellidos")); 
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de Nacimiento :</label>
	<div class="col-md-10">
		<?php

echo form_input(array("name"=>"fechanacimiento","id"=>"fechanacimiento","type"=>"date"));  

		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Correo principal:</label>
	<div class="col-md-10">
		<?php
 echo form_input("correo","", array("placeholder"=>"Correo principal"));
		?>
	</div> 
</div> 




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Teléfono principal:</label>
	<div class="col-md-10">
		<?php
		 echo form_input("telefono","", array("placeholder"=>"Teléfono principal"));

		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Genero:</label>
	<div class="col-md-10">
		<?php
		$options= array('--Select--');
		foreach ($generos as $row){
		$options[$row->idgenero]= $row->nombre;
		}
 		echo form_dropdown("idgenero",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 


<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('persona', 'Cancelar'); ?></li>
	</ul>
</div> 


<?php echo form_close();?>

