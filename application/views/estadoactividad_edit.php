<?php echo form_open('estadoactividad/save_edit') ?>
<?php echo form_hidden('idestadoactividad',$estadoactividad['idestadoactividad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estadoactividad</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestadoactividad','value'=>$estadoactividad['idestadoactividad'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$estadoactividad['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Color:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'color','value'=>$estadoactividad['color'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estadoactividad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
