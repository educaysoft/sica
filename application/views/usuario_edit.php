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
     <td>Id Persona:</td>
      
     <td><?php 

 $options = array('--Select--');
  foreach ($personas as $row){
	$options[$row->idpersona]=$row->nombres;
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
      <td><?php echo form_input('email',$usuario['email'],array('placeholder'=>'email')) ?></td>
  </tr>

<tr>
     <td>Inicio</td>
     <td><?php echo form_input('inicio',$usuario['inicio'],array('placeholder'=>'Inicio')) ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('usuario','Atrás') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
