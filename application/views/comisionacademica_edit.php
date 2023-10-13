<?php echo form_open('comisionacademica/save_edit') ?>
<?php echo form_hidden('idcomisionacademica',$comisionacademica['idcomisionacademica']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id comisionacademica</td>
     <td><?php echo form_textarea('idcomisionacademica',$comisionacademica['idcomisionacademica'],array('placeholder'=>'Idcomisionacademica')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$comisionacademica['nombre'],array('placeholder'=>'Nombre comisionacademica')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('comisionacademica','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
