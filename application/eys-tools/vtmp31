<?php echo form_open('etapamovilidad/save_edit') ?>
<?php echo form_hidden('idetapamovilidad',$etapamovilidad['idetapamovilidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id etapamovilidad</td>
     <td><?php 


$eys_arrinput=array('name'=>'idetapamovilidad','value'=>$etapamovilidad['idetapamovilidad'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$etapamovilidad['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('etapamovilidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
