<?php echo form_open('directorio/save_edit') ?>
<?php echo form_hidden('iddirectorio',$directorio['iddirectorio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
  
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$directorio['nombre'],array('placeholder'=>'Nombre de directorio')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('directorio','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
