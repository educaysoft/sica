<?php echo form_open('nacionalidad/save_edit') ?>
<?php echo form_hidden('idnacionalidad',$nacionalidad['idnacionalidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id nacionalidad</td>
     <td><?php echo form_textarea('idnacionalidad',$nacionalidad['idnacionalidad'],array('placeholder'=>'Idnacionalidad')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$nacionalidad['nombre'],array('placeholder'=>'Nombre nacionalidad')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('nacionalidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
