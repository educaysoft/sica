<?php echo form_open('visitante/save_edit') ?>
<?php echo form_hidden('idvisitante',$visitante['idvisitante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
     <td>Id visitante</td>
     <td>
        <?php 
	$eys_arrinput=array('name'=>'idvisitante','value'=>$visitante['idvisitante'],'readonly'=>'true', "style"=>"width:500px");
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

 echo form_dropdown("idevento",$options, $visitante['idevento']);  ?></td>
</tr>

 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $visitante['idpersona']);  ?></td>
</tr>




<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $visitante['iddocumento']);  ?></td>
</tr>


<tr>
<td> Estado de la participancion:</td>
<td><?php
$options= array('--Select--');
foreach ($visitanteestado as $row){
	$options[$row->idvisitanteestado]= $row->nombre;
}

 echo form_dropdown("idvisitanteestado",$options, $visitante['idvisitanteestado']);  ?></td>
</tr>



<tr>
<td> Nivel del visitante:</td>
<td><?php
$options= array('--Select--');
foreach ($nivelvisitante as $row){
	$options[$row->idnivelvisitante]= $row->nombre;
}

 echo form_dropdown("idnivelvisitante",$options, $visitante['idnivelvisitante']);  ?></td>
</tr>




<tr>
     <td>Grupo:</td>
     <td>
        <?php 
	$eys_arrinput=array('name'=>'grupoletra','value'=>$visitante['grupoletra'], "style"=>"width:500px");
	echo form_input($eys_arrinput); ?>
     </td>
  </tr>




 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('visitante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
