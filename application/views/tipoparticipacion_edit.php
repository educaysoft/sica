<?php echo form_open('tipoparticipacion/save_edit') ?>
<?php echo form_hidden('idtipoparticipacion',$tipoparticipacion['idtipoparticipacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
    
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipoparticipacion['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipoparticipacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
