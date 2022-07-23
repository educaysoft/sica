<?php echo form_open('portafolioestado/save_edit') ?>
<?php echo form_hidden('idportafolioestado',$portafolioestado['idportafolioestado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$portafolioestado['nombre'],array('placeholder'=>'Nombre Portafolioestado')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('portafolioestado','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
