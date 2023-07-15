<?php echo form_open('metodologiasasignatura/save_edit') ?>
<?php echo form_hidden('idmetodologiasasignatura',$metodologiasasignatura['idmetodologiasasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id metodologiasasignatura</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmetodologiasasignatura','value'=>$metodologiasasignatura['idmetodologiasasignatura'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $metodologiasasignatura['idasignatura']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipometodologiasasignaturas as $row){
	$options[$row->idtipometodologiasasignatura]= $row->nombre;
}

 echo form_dropdown("idtipometodologiasasignatura",$options, $metodologiasasignatura['idtipometodologiasasignatura']);  ?></td>
</tr>

<tr>
      <td>Cantidad:</td>
      <td><?php echo form_input( array("name"=>'cantidad',"id"=>'cantidad',"value"=>$metodologiasasignatura['cantidad'],'type'=>'text','placeholder'=>'cantidad')); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('metodologiasasignatura','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
