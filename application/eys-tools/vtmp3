<?php echo form_open('tipoevento/save_edit') ?>
<?php echo form_hidden('idtipoevento',$tipoevento['idtipoevento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipoevento</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipoevento','value'=>$tipoevento['idtipoevento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipoevento['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipoevento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
