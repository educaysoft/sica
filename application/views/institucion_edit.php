<?php echo form_open('institucion/save_edit') ?>
<?php echo form_hidden('idinstitucion',$institucion['idinstitucion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id institucion</td>
     <td><?php 


$eys_arrinput=array('name'=>'idinstitucion','value'=>$institucion['idinstitucion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$institucion['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('institucion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
