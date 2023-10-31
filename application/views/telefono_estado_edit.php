<?php echo form_open('telefono_estado/save_edit') ?>
<?php echo form_hidden('idtelefono_estado',$telefono_estado['idtelefono_estado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id telefono_estado</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtelefono_estado','value'=>$telefono_estado['idtelefono_estado'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$telefono_estado['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('telefono_estado','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
