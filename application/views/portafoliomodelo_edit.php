<?php echo form_open('portafoliomodelo/save_edit') ?>
<?php echo form_hidden('idportafoliomodelo',$portafoliomodelo['idportafoliomodelo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$portafoliomodelo['nombre'],array('placeholder'=>'Nombre Portafoliomodelo')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('portafoliomodelo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
