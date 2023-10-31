<?php echo form_open('indicadoracademico/save_edit') ?>
<?php echo form_hidden('idindicadoracademico',$indicadoracademico['idindicadoracademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id indicadoracademico</td>
     <td><?php 


$eys_arrinput=array('name'=>'idindicadoracademico','value'=>$indicadoracademico['idindicadoracademico'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$indicadoracademico['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('indicadoracademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
