<?php echo form_open('correo_estado/save_edit') ?>
<?php echo form_hidden('idcorreo_estado',$correo_estado['idcorreo_estado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id correo_estado</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcorreo_estado','value'=>$correo_estado['idcorreo_estado'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$correo_estado['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('correo_estado','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
