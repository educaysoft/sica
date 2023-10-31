<?php echo form_open('metodologiatema/save_edit') ?>
<?php echo form_hidden('idmetodologiatema',$metodologiatema['idmetodologiatema']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id metodologiatema</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmetodologiatema','value'=>$metodologiatema['idmetodologiatema'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $metodologiatema['idasignatura']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipometodologiatemas as $row){
	$options[$row->idtipometodologiatema]= $row->nombre;
}

 echo form_dropdown("idtipometodologiatema",$options, $metodologiatema['idtipometodologiatema']);  ?></td>
</tr>

<tr>
      <td>Cantidad:</td>
      <td><?php echo form_input( array("name"=>'cantidad',"id"=>'cantidad',"value"=>$metodologiatema['cantidad'],'type'=>'text','placeholder'=>'cantidad')); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('metodologiatema','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
