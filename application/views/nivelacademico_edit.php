<?php echo form_open('nivelacademico/save_edit') ?>
<?php echo form_hidden('idnivelacademico',$nivelacademico['idnivelacademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id nivelacademico</td>
     <td><?php 


$eys_arrinput=array('name'=>'idnivelacademico','value'=>$nivelacademico['idnivelacademico'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$nivelacademico['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('nivelacademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
