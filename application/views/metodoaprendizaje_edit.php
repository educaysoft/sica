<?php echo form_open('metodoaprendizaje/save_edit') ?>
<?php echo form_hidden('idmetodoaprendizaje',$metodoaprendizaje['idmetodoaprendizaje']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id metodoaprendizaje</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmetodoaprendizaje','value'=>$metodoaprendizaje['idmetodoaprendizaje'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$metodoaprendizaje['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('metodoaprendizaje','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
