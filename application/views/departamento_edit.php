<?php echo form_open('departamento/save_edit') ?>
<?php echo form_hidden('iddepartamento',$departamento['iddepartamento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id Departamento</td>
     <td><?php echo form_textarea('iddepartamento',$departamento['iddepartamento'],array('placeholder'=>'Id departamento')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$departamento['nombre'],array('placeholder'=>'Nombre')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('departamento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
