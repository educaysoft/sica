<?php echo form_open('tiposangre/save_edit') ?>
<?php echo form_hidden('idtiposangre',$tiposangre['idtiposangre']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tiposangre</td>
     <td><?php echo form_textarea('idtiposangre',$tiposangre['idtiposangre'],array('placeholder'=>'Idtiposangre')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$tiposangre['nombre'],array('placeholder'=>'Nombre tiposangre')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tiposangre','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
