<?php echo form_open('estadotrabajointegracioncurricular/save_edit') ?>
<?php echo form_hidden('idestadotrabajointegracioncurricular',$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estadotrabajointegracioncurricular</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestadotrabajointegracioncurricular','value'=>$estadotrabajointegracioncurricular['idestadotrabajointegracioncurricular'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$estadotrabajointegracioncurricular['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estadotrabajointegracioncurricular','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
