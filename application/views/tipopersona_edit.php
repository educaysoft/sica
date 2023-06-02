<?php echo form_open('tipopersona/save_edit') ?>
<?php echo form_hidden('idtipopersona',$tipopersona['idtipopersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipopersona</td>
     <td><?php echo form_textarea('idtipopersona',$tipopersona['idtipopersona'],array('placeholder'=>'Idtipopersona')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('descripcion',$tipopersona['descripcion'],array('placeholder'=>'Nombre tipopersona')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipopersona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
