<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('usuario/save_edit') ?>
    <ul>
        <li> <?php echo anchor('usuario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('usuario/anterior/'.$usuario['idusuario'], 'anterior'); ?></li>
        <li> <?php echo anchor('usuario/siguiente/'.$usuario['idusuario'],'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('usuario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('usuario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('usuario/edit/'.$usuario['idusuario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('usuario/delete/'.$usuario['idusuario'],'Delete'); ?></li>
        <li> <?php echo anchor('usuario/listar/','Listar'); ?></li>
        <li> <?php echo anchor('acceso/actual/'.$usuario['idusuario'],'Acceso'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idusuario',$usuario['idusuario']) ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Institución :</label>
	<div class="col-md-10">
	<?php

$options= array("NADA");
foreach ($instituciones as $row){
	$options[$row->idinstitucion]=$row->nombre;
}

echo form_input('idinstitucion',$options[$usuario['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px')); 

	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Perfil :</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."   ".$row->nombres;
}

echo form_input('idpersona',$options[$usuario['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px')); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Perfil :</label>
	<div class="col-md-10">
	<?php

$options= array("NADA");
foreach ($perfiles as $row){
	$options[$row->idperfil]= $row->nombre;
}

echo form_input('idperfil',$options[$usuario['idperfil']],array("disabled"=>"disabled",'style'=>'width:500px'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Usuario :</label>
	<div class="col-md-10">
	<?php

      echo form_input('idusuario',$usuario['idusuario'],array("disabled"=>"disabled",'placeholder'=>'Idusuarios','style'=>'width:500px')); 
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Contraseña :</label>
	<div class="col-md-10">
	<?php
      echo form_input('password',$usuario['password'],array("disabled"=>"disabled",'placeholder'=>'password','style'=>'width:500px'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Email :</label>
	<div class="col-md-10">
	<?php

      echo form_input('email',$usuario['email'],array("disabled"=>"disabled",'placeholder'=>'email','style'=>'width:500px')); 

	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Modulo de inicio:</label>
	<div class="col-md-10">
	<?php

      echo form_input('inicio',$usuario['inicio'],array("disabled"=>"disabled",'placeholder'=>'modulo','style'=>'width:500px')); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Página de incio : <?php echo anchor('pagina/actual/'.$usuario['idpagina'], 'ver'); ?> </label>
	<div class="col-md-10">
	<?php

$options= array("NADA");
foreach ($paginas as $row){
	$options[$row->idpagina]= $row->nombre;
}

echo form_input('idpagina',$options[$usuario['idpagina']],array("disabled"=>"disabled",'style'=>'width:500px'));
	?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
