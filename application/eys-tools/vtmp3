<?php echo form_open('estadoproceso/save_edit') ?>
<?php echo form_hidden('idestadoproceso',$estadoproceso['idestadoproceso']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estadoproceso</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestadoproceso','value'=>$estadoproceso['idestadoproceso'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$estadoproceso['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estadoproceso','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
