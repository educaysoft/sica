<?php echo form_open('provincia/save_edit') ?>
<?php echo form_hidden('idprovincia',$provincia['idprovincia']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id provincia</td>
     <td><?php echo form_textarea('idprovincia',$provincia['idprovincia'],array('placeholder'=>'Idprovincia')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$provincia['nombre'],array('placeholder'=>'Nombre provincia')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('provincia','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
