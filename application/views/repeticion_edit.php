<?php echo form_open('repeticion/save_edit') ?>
<?php echo form_hidden('idrepeticion',$repeticion['idrepeticion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id repeticion</td>
     <td><?php echo form_textarea('idrepeticion',$repeticion['idrepeticion'],array('placeholder'=>'Idrepeticion')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$repeticion['nombre'],array('placeholder'=>'Nombre repeticion')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('repeticion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
