<!--Arhivo: modeevaluacion_edit.php -->
<!--Modulo: modoevaluacion -->
<!--Descripción: vista que permite modificar la información del modo de evaluacion -->
<!--Autor: Stalin Francis -->
<!--Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->


<?php echo form_open('modoevaluacion/save_edit') ?>
<?php echo form_hidden('idmodoevaluacion',$modoevaluacion['idmodoevaluacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id modoevaluacion</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmodoevaluacion','value'=>$modoevaluacion['idmodoevaluacion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 




  <tr>
      <td>Nombre:</td>
      <td><?php
$eys_arrinput=array('name'=>'nombre','value'=>$modoevaluacion['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Ponderación:</td>
      <td><?php
$eys_arrinput=array('name'=>'ponderacion','value'=>$modoevaluacion['ponderacion'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('modoevaluacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
