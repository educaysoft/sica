<?php echo form_open('pais/save_edit') ?>
<?php echo form_hidden('idpais',$pais['idpais']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id pais</td>
     <td><?php echo form_textarea('idpais',$pais['idpais'],array('placeholder'=>'Idpais')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$pais['nombre'],array('placeholder'=>'Nombre pais')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('pais','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
