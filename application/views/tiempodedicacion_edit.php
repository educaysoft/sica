<?php echo form_open('tiempodedicacion/save_edit') ?>
<?php echo form_hidden('idtiempodedicacion',$tiempodedicacion['idtiempodedicacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tiempodedicacion</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtiempodedicacion','value'=>$tiempodedicacion['idtiempodedicacion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 




  <tr>
      <td>Nombre:</td>
      <td><?php
$eys_arrinput=array('name'=>'nombre','value'=>$tiempodedicacion['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tiempodedicacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
