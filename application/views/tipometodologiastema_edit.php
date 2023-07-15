<?php echo form_open('tipometodologiastema/save_edit') ?>
<?php echo form_hidden('idtipometodologiastema',$tipometodologiastema['idtipometodologiastema']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipometodologiastema</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipometodologiastema','value'=>$tipometodologiastema['idtipometodologiastema'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipometodologiastema['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipometodologiastema','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
