<?php echo form_open('tipopublicacion/save_edit') ?>
<?php echo form_hidden('idtipopublicacion',$tipopublicacion['idtipopublicacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipopublicacion</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipopublicacion','value'=>$tipopublicacion['idtipopublicacion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipopublicacion['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipopublicacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
