<?php echo form_open('nivelestudio/save_edit') ?>
<?php echo form_hidden('idnivelestudio',$nivelestudio['idnivelestudio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id nivelestudio</td>
     <td><?php 


$eys_arrinput=array('name'=>'idnivelestudio','value'=>$nivelestudio['idnivelestudio'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 

<tr>
      <td>Numero:</td>
      <td><?php
$eys_arrinput=array('name'=>'numero','value'=>$nivelestudio['numero'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>


  <tr>
      <td>Nombre:</td>
      <td><?php
$eys_arrinput=array('name'=>'nombre','value'=>$nivelestudio['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('nivelestudio','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
