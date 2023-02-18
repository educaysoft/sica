<?php echo form_open('horasasignatura/save_edit') ?>
<?php echo form_hidden('idhorasasignatura',$horasasignatura['idhorasasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id horasasignatura</td>
     <td><?php 


$eys_arrinput=array('name'=>'idhorasasignatura','value'=>$horasasignatura['idhorasasignatura'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $horasasignatura['idasignatura']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipohorasasignaturas as $row){
	$options[$row->idtipohorasasignatura]= $row->nombre;
}

 echo form_dropdown("idtipohorasasignatura",$options, $horasasignatura['idtipohorasasignatura']);  ?></td>
</tr>

<tr>
      <td>Cantidad:</td>
      <td><?php echo form_input( array("name"=>'cantidad',"id"=>'cantidad',"value"=>$horasasignatura['cantidad'],'type'=>'text','placeholder'=>'cantidad')); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('horasasignatura','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
