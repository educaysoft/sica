<?php echo form_open('areaconocimiento/save_edit') ?>
<?php echo form_hidden('idareaconocimiento',$areaconocimiento['idareaconocimiento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id areaconocimiento</td>
     <td><?php 


$eys_arrinput=array('name'=>'idareaconocimiento','value'=>$areaconocimiento['idareaconocimiento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 




  <tr>
      <td>Nombre:</td>
      <td><?php
$eys_arrinput=array('name'=>'nombre','value'=>$areaconocimiento['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('areaconocimiento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
