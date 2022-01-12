<?php echo form_open('unidad/save_edit') ?>
<?php echo form_hidden('idunidad',$unidad['idunidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
  
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$unidad['nombre'],array('placeholder'=>'Nombre de Unidad')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('unidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
