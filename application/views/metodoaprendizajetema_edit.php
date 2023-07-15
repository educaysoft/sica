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
foreach ($temas as $row){
	$options[$row->idtema]=$row->nombrecorto;
}

 echo form_dropdown("idtema",$options, $metodoaprendizajetema['idtema']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($metodoaprendizajetemas as $row){
	$options[$row->idmetodoaprendizaje]= $row->nombre;
}

 echo form_dropdown("idmetodoaprendizaje",$options, $metodoaprendizajetema['idmetodoaprendizaje']);  ?></td>
</tr>







 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('metodoaprendizajetema','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
