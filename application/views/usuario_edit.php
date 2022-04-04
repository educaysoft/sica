<?php echo form_open('usuario/save_edit') ?>
<?php echo form_hidden('idusuario',$usuario['idusuario']) ?>
<div style="margin-top=5cm">
<h2> <?php echo $title; ?></h2>
</div>
<hr />
<table>
  <tr>
     <td>Contraseña</td>
     <td><?php echo form_input('password',$usuario['password'],array('placeholder'=>'Password')) ?></td>
  </tr>


	<tr>
     	<td>Institución:</td>
     	<td><?php 
 	$options = array('--Select--');
  	foreach ($instituciones as $row){
		$options[$row->idinstitucion]=$row->nombre;
	}
	echo form_dropdown('idinstitucion',$options,$usuario['idinstitucion']); ?></td>
  	</tr>


  <tr>
     <td>Id Persona:</td>
     <td><?php 

	$options = array('--Select--');
  	foreach ($personas as $row){
		$options[$row->idpersona]=is_null($row->apellidos)?" ":$row->apellidos." ".$row->nombres;
	}

echo form_dropdown('idpersona',$options,$usuario['idpersona']); ?></td>
  </tr>
   <tr>
     <td>Id Perfil</td>
     <td><?php

 $options = array('--Select--');
  foreach ($perfiles as $row){
	$options[$row->idperfil]=$row->nombre;
}



 echo form_dropdown('idperfil',$options,$usuario['idperfil']) ?></td>
  </tr> 
  <tr>
      <td>Email:</td>
      <td><?php echo form_input('email',$usuario['email'],array('placeholder'=>'email','style'=>"width:500px;")) ?></td>
  </tr>

<tr>
     <td>Inicio</td>
     <td><?php echo form_input(array('name'=>'inicio','id'=>'inicio','value'=>$usuario['inicio'],'placeholder'=>'Inicio','style'=>'width:500px;')) ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('usuario','Atrás') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
