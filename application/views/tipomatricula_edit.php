<?php echo form_open('tipomatricula/save_edit') ?>
<?php echo form_hidden('idtipomatricula',$tipomatricula['idtipomatricula']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipomatricula</td>
     <td><?php echo form_textarea('idtipomatricula',$tipomatricula['idtipomatricula'],array('placeholder'=>'Idtipomatricula')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$tipomatricula['nombre'],array('placeholder'=>'Nombre tipomatricula')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipomatricula','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
