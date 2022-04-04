<?php echo form_open('categoria/save_edit') ?>
<?php echo form_hidden('idcategoria',$categoria['idcategoria']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$categoria['nombre'],array('placeholder'=>'Nombre Categoria')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('categoria','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
