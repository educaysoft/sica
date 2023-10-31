<?php echo form_open('tiporeferenciasasignatura/save_edit') ?>
<?php echo form_hidden('idtiporeferenciasasignatura',$tiporeferenciasasignatura['idtiporeferenciasasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tiporeferenciasasignatura</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtiporeferenciasasignatura','value'=>$tiporeferenciasasignatura['idtiporeferenciasasignatura'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tiporeferenciasasignatura['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tiporeferenciasasignatura','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
