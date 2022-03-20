<?php echo form_open('tipoasistencia/save_edit') ?>
<?php echo form_hidden('idtipoasistencia',$tipoasistencia['idtipoasistencia']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
    
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipoasistencia['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipoasistencia','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
