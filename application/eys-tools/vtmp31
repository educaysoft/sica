<?php echo form_open('participante/save_edit') ?>
<?php echo form_hidden('idparticipante',$participante['idparticipante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
     <td>Id participante</td>
     <td>
        <?php 
	$eys_arrinput=array('name'=>'idparticipante','value'=>$participante['idparticipante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?>
     </td>
  </tr> 





<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $participante['idevento']);  ?></td>
</tr>

 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $participante['idpersona']);  ?></td>
</tr>




<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $participante['iddocumento']);  ?></td>
</tr>


<tr>
<td> Estado de la participancion:</td>
<td><?php
$options= array('--Select--');
foreach ($participanteestado as $row){
	$options[$row->idparticipanteestado]= $row->nombre;
}

 echo form_dropdown("idparticipanteestado",$options, $participante['idparticipanteestado']);  ?></td>
</tr>



<tr>
<td> Nivel del participante:</td>
<td><?php
$options= array('--Select--');
foreach ($nivelparticipante as $row){
	$options[$row->idnivelparticipante]= $row->nombre;
}

 echo form_dropdown("idnivelparticipante",$options, $participante['idnivelparticipante']);  ?></td>
</tr>




<tr>
     <td>Grupo:</td>
     <td>
        <?php 
	$eys_arrinput=array('name'=>'grupoletra','value'=>$participante['grupoletra'], "style"=>"width:500px");
	echo form_input($eys_arrinput); ?>
     </td>
  </tr>




 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('participante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
