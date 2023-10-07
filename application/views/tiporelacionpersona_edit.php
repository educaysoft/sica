<?php echo form_open('tiporelacionpersona/save_edit') ?>
<?php echo form_hidden('idtiporelacionpersona',$tiporelacionpersona['idtiporelacionpersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$tiporelacionpersona['nombre'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tiporelacionpersona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
