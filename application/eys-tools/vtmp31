<?php echo form_open('evento_estado/save_edit') ?>
<?php echo form_hidden('idevento_estado',$evento_estado['idevento_estado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id evento_estado</td>
     <td><?php 


$eys_arrinput=array('name'=>'idevento_estado','value'=>$evento_estado['idevento_estado'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$evento_estado['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('evento_estado','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
