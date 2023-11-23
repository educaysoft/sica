<?php echo form_open('tipomovilidadalumno/save_edit') ?>
<?php echo form_hidden('idtipomovilidadalumno',$tipomovilidadalumno['idtipomovilidadalumno']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipomovilidadalumno</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipomovilidadalumno','value'=>$tipomovilidadalumno['idtipomovilidadalumno'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tipomovilidadalumno['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipomovilidadalumno','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
