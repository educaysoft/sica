<?php echo form_open('estado_portafolio/save_edit') ?>
<?php echo form_hidden('idestado_portafolio',$estado_portafolio['idestado_portafolio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$estado_portafolio['nombre'],array('placeholder'=>'Nombre Estado_portafolio')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estado_portafolio','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
