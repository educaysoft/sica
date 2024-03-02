<?php echo form_open('sexo/save_edit') ?>
<?php echo form_hidden('idsexo',$sexo['idsexo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id sexo</td>
     <td><?php echo form_textarea('idsexo',$sexo['idsexo'],array('placeholder'=>'Idsexo')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$sexo['nombre'],array('placeholder'=>'Nombre sexo')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('sexo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
