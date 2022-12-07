<?php echo form_open('diasemana/save_edit') ?>
<?php echo form_hidden('iddiasemana',$diasemana['iddiasemana']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id diasemana</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddiasemana','value'=>$diasemana['iddiasemana'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 




  <tr>
      <td>Nombre:</td>
      <td><?php
$eys_arrinput=array('name'=>'nombre','value'=>$diasemana['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('diasemana','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
