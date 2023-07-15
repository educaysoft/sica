<?php echo form_open('tipohorasasignatura/save_edit') ?>
<?php echo form_hidden('idtipohorasasignatura',$tipohorasasignatura['idtipohorasasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipohorasasignatura</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipohorasasignatura','value'=>$tipohorasasignatura['idtipohorasasignatura'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipohorasasignatura['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipohorasasignatura','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
