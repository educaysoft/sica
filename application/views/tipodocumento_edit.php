<?php echo form_open('tipodocumento/save_edit') ?>
<?php echo form_hidden('idtipodocumento',$tipodocumento['idtipodocumento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipodocumento</td>
     <td><?php echo form_textarea('idtipodocumento',$tipodocumento['idtipodocumento'],array('placeholder'=>'Idtipodocumento')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$tipodocumento['nombre'],array('placeholder'=>'Nombre tipodocumento')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipodocumento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
