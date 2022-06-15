<?php echo form_open('participanteestado/save_edit') ?>
<?php echo form_hidden('idparticipanteestado',$participanteestado['idparticipanteestado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id participanteestado</td>
     <td><?php 


$eys_arrinput=array('name'=>'idparticipanteestado','value'=>$participanteestado['idparticipanteestado'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$participanteestado['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('participanteestado','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
