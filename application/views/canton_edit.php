<?php echo form_open('canton/save_edit') ?>
<?php echo form_hidden('idcanton',$canton['idcanton']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id canton</td>
     <td><?php echo form_textarea('idcanton',$canton['idcanton'],array('placeholder'=>'Idcanton')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$canton['nombre'],array('placeholder'=>'Nombre canton')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('canton','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
