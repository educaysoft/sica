<?php echo form_open('participacion/save_edit') ?>
<?php echo form_hidden('idparticipacion',$participacion['idparticipacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id participacion</td>
     <td><?php 


$eys_arrinput=array('name'=>'idparticipacion','value'=>$participacion['idparticipacion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 





<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $participacion['idevento']);  ?></td>
</tr>

 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $participacion['idpersona']);  ?></td>
</tr>




<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $participacion['iddocumento']);  ?></td>
</tr>




 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('participacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
