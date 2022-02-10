<?php echo form_open('ordenador/save_edit') ?>
<?php echo form_hidden('idordenador',$ordenador['idordenador']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id ordenador</td>
     <td><?php 


$eys_arrinput=array('name'=>'idordenador','value'=>$ordenador['idordenador'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$ordenador['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('ordenador','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
