<?php echo form_open('metodologiastema/save_edit') ?>
<?php echo form_hidden('idmetodologiastema',$metodologiastema['idmetodologiastema']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id metodologiastema</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmetodologiastema','value'=>$metodologiastema['idmetodologiastema'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $metodologiastema['idasignatura']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipometodologiastemas as $row){
	$options[$row->idtipometodologiastema]= $row->nombre;
}

 echo form_dropdown("idtipometodologiastema",$options, $metodologiastema['idtipometodologiastema']);  ?></td>
</tr>

<tr>
      <td>Cantidad:</td>
      <td><?php echo form_input( array("name"=>'cantidad',"id"=>'cantidad',"value"=>$metodologiastema['cantidad'],'type'=>'text','placeholder'=>'cantidad')); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('metodologiastema','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
