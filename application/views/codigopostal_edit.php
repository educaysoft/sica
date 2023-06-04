<?php echo form_open('codigopostal/save_edit') ?>
<?php echo form_hidden('idcodigopostal',$codigopostal['idcodigopostal']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id codigopostal</td>
     <td><?php echo form_textarea('idcodigopostal',$codigopostal['idcodigopostal'],array('placeholder'=>'Idcodigopostal')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$codigopostal['nombre'],array('placeholder'=>'Nombre codigopostal')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('codigopostal','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
