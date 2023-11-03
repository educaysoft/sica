<?php echo form_open('destinodocumento/save_edit') ?>
<?php echo form_hidden('iddestinodocumento',$destinodocumento['iddestinodocumento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id destinodocumento</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddestinodocumento','value'=>$destinodocumento['iddestinodocumento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$destinodocumento['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('destinodocumento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
