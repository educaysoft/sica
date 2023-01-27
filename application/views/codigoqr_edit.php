<?php echo form_open('codigoqr/save_edit') ?>
<?php echo form_hidden('idcodigoqr',$codigoqr['idcodigoqr']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id codigoqr</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcodigoqr','value'=>$codigoqr['idcodigoqr'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 




  <tr>
      <td>filename:</td>
      <td><?php
$eys_arrinput=array('name'=>'filename','value'=>$codigoqr['filename'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
      <td>Tamanio:</td>
      <td><?php
$eys_arrinput=array('name'=>'tamanio','value'=>$codigoqr['tamanio'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
      <td>Levele:</td>
      <td><?php
$eys_arrinput=array('name'=>'level','value'=>$codigoqr['level'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>framesize:</td>
      <td><?php
$eys_arrinput=array('name'=>'framesize','value'=>$codigoqr['framesize'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
      <td>Contenido:</td>
      <td><?php
$eys_arrinput=array('name'=>'contenido','value'=>$codigoqr['contenido'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>




 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('codigoqr','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
