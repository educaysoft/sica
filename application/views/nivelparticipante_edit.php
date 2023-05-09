<?php echo form_open('nivelparticipante/save_edit') ?>
<?php echo form_hidden('idnivelparticipante',$nivelparticipante['idnivelparticipante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>

<tr>
<td> Tipo de evento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipoeventos as $row){
	$options[$row->idtipoevento]= $row->nombre;
}

 echo form_dropdown("idtipoevento",$options, $nivelparticipante['idtipoevento']);  ?></td>
</tr>


   <tr>
     <td>Id nivelparticipante</td>
     <td><?php 


$eys_arrinput=array('name'=>'idnivelparticipante','value'=>$nivelparticipante['idnivelparticipante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$nivelparticipante['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('nivelparticipante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
