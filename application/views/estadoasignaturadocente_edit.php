<?php echo form_open('estadoasignaturadocente/save_edit') ?>
<?php echo form_hidden('idestadoasignaturadocente',$estadoasignaturadocente['idestadoasignaturadocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estadoasignaturadocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestadoasignaturadocente','value'=>$estadoasignaturadocente['idestadoasignaturadocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$estadoasignaturadocente['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estadoasignaturadocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
