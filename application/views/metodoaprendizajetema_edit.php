<?php echo form_open('metodoaprendizajetema/save_edit') ?>
<?php echo form_hidden('idmetodoaprendizajetema',$metodoaprendizajetema['idmetodoaprendizajetema']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id metodoaprendizajetema</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmetodoaprendizajetema','value'=>$metodoaprendizajetema['idmetodoaprendizajetema'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $metodoaprendizajetema['idasignatura']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipometodoaprendizajetemas as $row){
	$options[$row->idtipometodoaprendizajetema]= $row->nombre;
}

 echo form_dropdown("idtipometodoaprendizajetema",$options, $metodoaprendizajetema['idtipometodoaprendizajetema']);  ?></td>
</tr>

<tr>
      <td>Cantidad:</td>
      <td><?php echo form_input( array("name"=>'cantidad',"id"=>'cantidad',"value"=>$metodoaprendizajetema['cantidad'],'type'=>'text','placeholder'=>'cantidad')); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('metodoaprendizajetema','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
