<?php echo form_open('cargo/save_edit') ?>
<?php echo form_hidden('idcargo',$cargo['idcargo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id cargo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcargo','value'=>$cargo['idcargo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$cargo['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('cargo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
