<?php echo form_open('portafoliotipo/save_edit') ?>
<?php echo form_hidden('idportafoliotipo',$portafoliotipo['idportafoliotipo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id portafoliotipo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idportafoliotipo','value'=>$portafoliotipo['idportafoliotipo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$portafoliotipo['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('portafoliotipo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
