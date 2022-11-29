<?php echo form_open('asignaturadocente/save_edit') ?>
<?php echo form_hidden('idasignaturadocente',$asignaturadocente['idasignaturadocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id asignaturadocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idasignaturadocente','value'=>$asignaturadocente['idasignaturadocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Horario docente:</td>
<td><?php
$options= array('--Select--');
foreach ($horariodocentes as $row){
	$options[$row->idhorariodocente]= $row->elhorariodocente;
}

 echo form_dropdown("idhorariodocente",$options, $asignaturadocente['idhorariodocente']);  ?></td>
</tr>

<tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

 echo form_dropdown("idasignatura",$options, $asignaturadocente['idasignatura']);  ?></td>
</tr>


<tr>
<td> Paralelo:</td>
<td><?php
$options= array('--Select--');
foreach ($paralelos as $row){
	$options[$row->idparalelo]= $row->nombre;
}

 echo form_dropdown("idparalelo",$options, $asignaturadocente['idparalelo']);  ?></td>
</tr>



 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('asignaturadocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
