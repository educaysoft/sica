<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($persona))
{
?>
        <li> <?php echo anchor('persona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('persona/siguiente/'.$persona['idpersona'], 'siguiente'); ?></li>
        <li> <?php echo anchor('persona/anterior/'.$persona['idpersona'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('persona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('persona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('persona/edit/'.$persona['idpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('persona/delete/'.$persona['idpersona'],'Delete'); ?></li>
        <li> <?php echo anchor('persona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('persona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('persona/save_edit') ?>
<?php echo form_hidden('idpersona',$persona['idpersona']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
	<?php
		echo form_input('idpersona',$persona['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idpersonas'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Cédula:</label>
	<div class="col-md-10">
	<?php
      		echo form_input('cedula',$persona['cedula'],array("disabled"=>"disabled",'placeholder'=>'cedula')); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Apellido:</label>
	<div class="col-md-10">
	<?php
     		 echo form_input('apellidos',$persona['apellidos'],array("disabled"=>"disabled",'placeholder'=>'apellidos')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
      echo form_input('nombres',$persona['nombres'],array("disabled"=>"disabled",'placeholder'=>'nombres')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de nacimiento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('fechanacimiento',$persona['fechanacimiento'],array("disabled"=>"disabled",'placeholder'=>'Fechanacimiento')) ;

	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('correo/add', 'Correo:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($correos as $row){
		$options[$row->idcorreo]=$row->nombre;
	}
 echo form_multiselect('correo[]',$options,(array)set_value('idcorreo', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('telefono/add', 'Teléfono:'); ?>:</label>
	<div class="col-md-10">
	<?php

 	$options = array();
  	foreach ($telefonos as $row){
		$options[$row->idtelefono]=$row->numero;
	}
 echo form_multiselect('telefono[]',$options,(array)set_value('idtelefono', ''), array('style'=>'width:500px')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fofo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('foto',$persona['foto'],array("disabled"=>"disabled",'placeholder'=>'foto'));

	?>
	</div> 
</div> 


<div class="form-group row">
<label class="col-md-2 col-form-label"> Genero: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($generos as $row){
	$options[$row->idgenero]= $row->nombre;
}

echo form_input('idgenero',$options[$persona['idgenero']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
