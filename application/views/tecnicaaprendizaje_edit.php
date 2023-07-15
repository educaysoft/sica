<?php echo form_open('tecnicaaprendizaje/save_edit') ?>
<?php echo form_hidden('idtecnicaaprendizaje',$tecnicaaprendizaje['idtecnicaaprendizaje']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tecnicaaprendizaje</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtecnicaaprendizaje','value'=>$tecnicaaprendizaje['idtecnicaaprendizaje'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tecnicaaprendizaje['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tecnicaaprendizaje','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
