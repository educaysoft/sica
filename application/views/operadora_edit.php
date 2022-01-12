<?php echo form_open('operadora/save_edit') ?>
<?php echo form_hidden('idoperadora',$operadora['idoperadora']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$operadora['nombre'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('operadora','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
