<?php echo form_open('tipoactividadacademica/save_edit') ?>
<?php echo form_hidden('idtipoactividadacademica',$tipoactividadacademica['idtipoactividadacademica']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipoactividadacademica</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipoactividadacademica','value'=>$tipoactividadacademica['idtipoactividadacademica'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipoactividadacademica['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipoactividadacademica','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
