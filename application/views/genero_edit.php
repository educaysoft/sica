<?php echo form_open('genero/save_edit') ?>
<?php echo form_hidden('idgenero',$genero['idgenero']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id genero</td>
     <td><?php echo form_textarea('idgenero',$genero['idgenero'],array('placeholder'=>'Idgenero')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$genero['nombre'],array('placeholder'=>'Nombre genero')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('genero','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
