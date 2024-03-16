<?php echo form_open('tipoidentificacion/save_edit') ?>
<?php echo form_hidden('idtipoidentificacion',$tipoidentificacion['idtipoidentificacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipoidentificacion</td>
     <td><?php echo form_textarea('idtipoidentificacion',$tipoidentificacion['idtipoidentificacion'],array('placeholder'=>'Idtipoidentificacion')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$tipoidentificacion['nombre'],array('placeholder'=>'Nombre tipoidentificacion')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipoidentificacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
