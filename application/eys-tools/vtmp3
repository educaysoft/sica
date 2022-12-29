<?php echo form_open('paralelo/save_edit') ?>
<?php echo form_hidden('idparalelo',$paralelo['idparalelo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id paralelo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idparalelo','value'=>$paralelo['idparalelo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 




  <tr>
      <td>Nombre:</td>
      <td><?php
$eys_arrinput=array('name'=>'nombre','value'=>$paralelo['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('paralelo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
