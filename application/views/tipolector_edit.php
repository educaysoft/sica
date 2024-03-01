<?php echo form_open('tipolector/save_edit') ?>
<?php echo form_hidden('idtipolector',$tipolector['idtipolector']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipolector</td>
     <td><?php echo form_textarea('idtipolector',$tipolector['idtipolector'],array('placeholder'=>'Idtipolector')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$tipolector['nombre'],array('placeholder'=>'Nombre tipolector')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipolector','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
