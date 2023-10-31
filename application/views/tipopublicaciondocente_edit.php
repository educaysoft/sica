<?php echo form_open('tipopublicaciondocente/save_edit') ?>
<?php echo form_hidden('idtipopublicaciondocente',$tipopublicaciondocente['idtipopublicaciondocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipopublicaciondocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipopublicaciondocente','value'=>$tipopublicaciondocente['idtipopublicaciondocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipopublicaciondocente['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipopublicaciondocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
