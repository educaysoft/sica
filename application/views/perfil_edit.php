<?php echo form_open('perfil/save_edit') ?>
<?php echo form_hidden('idperfil',$perfil['idperfil']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id Perfil</td>
     <td><?php echo form_textarea('idperfil',$perfil['idperfil'],array('placeholder'=>'Idpefil')) ?></td>
  </tr> 
  <tr>
      <td>Descripcion:</td>
      <td><?php echo form_input('descripcion',$perfil['descripcion'],array('placeholder'=>'descripcion')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Actualizar'); ?> <?php echo anchor('perfil','Atrás') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
