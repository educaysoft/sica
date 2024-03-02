<?php echo form_open('estadocivil/save_edit') ?>
<?php echo form_hidden('idestadocivil',$estadocivil['idestadocivil']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estadocivil</td>
     <td><?php echo form_textarea('idestadocivil',$estadocivil['idestadocivil'],array('placeholder'=>'Idestadocivil')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$estadocivil['nombre'],array('placeholder'=>'Nombre estadocivil')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estadocivil','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
