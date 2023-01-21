<?php echo form_open('tipodocu/save_edit') ?>
<?php echo form_hidden('idtipodocu',$tipodocu['idtipodocu']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipodocu</td>
     <td><?php echo form_textarea('idtipodocu',$tipodocu['idtipodocu'],array('placeholder'=>'Idtipodocu')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('descripcion',$tipodocu['descripcion'],array('placeholder'=>'Nombre tipodocu')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipodocu','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
