<?php echo form_open('Asistencia/save_edit') ?>
<?php echo form_hidden('idAsistencia',$Asistencia['idAsistencia']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id Asistencia</td>
     <td><?php 


$eys_arrinput=array('name'=>'idAsistencia','value'=>$Asistencia['idAsistencia'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 





<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $Asistencia['idevento']);  ?></td>
</tr>

 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $Asistencia['idpersona']);  ?></td>
</tr>




<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $Asistencia['iddocumento']);  ?></td>
</tr>




 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('Asistencia','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
