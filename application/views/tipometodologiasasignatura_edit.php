<?php echo form_open('tipometodologiasasignatura/save_edit') ?>
<?php echo form_hidden('idtipometodologiasasignatura',$tipometodologiasasignatura['idtipometodologiasasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipometodologiasasignatura</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipometodologiasasignatura','value'=>$tipometodologiasasignatura['idtipometodologiasasignatura'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipometodologiasasignatura['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipometodologiasasignatura','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
