<?php echo form_open('estadodistributivo/save_edit') ?>
<?php echo form_hidden('idestadodistributivo',$estadodistributivo['idestadodistributivo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estadodistributivo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestadodistributivo','value'=>$estadodistributivo['idestadodistributivo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$estadodistributivo['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estadodistributivo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
