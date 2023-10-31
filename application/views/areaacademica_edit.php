<?php echo form_open('areaacademica/save_edit') ?>
<?php echo form_hidden('idareaacademica',$areaacademica['idareaacademica']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id areaacademica</td>
     <td><?php echo form_textarea('idareaacademica',$areaacademica['idareaacademica'],array('placeholder'=>'Idareaacademica')) ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$areaacademica['nombre'],array('placeholder'=>'Nombre areaacademica')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('areaacademica','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
