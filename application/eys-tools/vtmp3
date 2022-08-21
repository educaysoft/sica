<?php echo form_open('cicloacademico/save_edit') ?>
<?php echo form_hidden('idcicloacademico',$cicloacademico['idcicloacademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id cicloacademico</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcicloacademico','value'=>$cicloacademico['idcicloacademico'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$cicloacademico['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('cicloacademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
