<?php echo form_open('ciclo/save_edit') ?>
<?php echo form_hidden('idciclo',$ciclo['idciclo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id ciclo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idciclo','value'=>$ciclo['idciclo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$ciclo['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('ciclo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
