<?php echo form_open('documento_estado/save_edit') ?>
<?php echo form_hidden('iddocumento_estado',$documento_estado['iddocumento_estado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id documento_estado</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddocumento_estado','value'=>$documento_estado['iddocumento_estado'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$documento_estado['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('documento_estado','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
