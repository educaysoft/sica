<?php echo form_open('asignaturadeldocente/save_edit') ?>
<?php echo form_hidden('idasignaturadeldocente',$asignaturadeldocente['idasignaturadeldocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id asignaturadeldocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idasignaturadeldocente','value'=>$asignaturadeldocente['idasignaturadeldocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Docente:</td>
<td><?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

 echo form_dropdown("iddocente",$options, $asignaturadeldocente['iddocente']);  ?></td>
</tr>

<tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->idasignatura+' - '+$row->area+' - '+$row->nivel+' - '+$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $asignaturadeldocente['idasignatura']);  ?></td>
</tr>


<tr>
<td> Tiempo dedicación:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->nombre;
}

 echo form_dropdown("iddocumento",$options, $asignaturadeldocente['iddocumento']);  ?></td>
</tr>


 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('asignaturadeldocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
