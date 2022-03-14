<?php echo form_open('certificado/save_edit') ?>
<?php echo form_hidden('idcertificado',$certificado['idcertificado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id certificado</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcertificado','value'=>$certificado['idcertificado'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 







 
 




<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $certificado['idevento']);  ?></td>
</tr>



<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

 echo form_dropdown("idtipodocu",$options, $certificado['idtipodocu']);  ?></td>
</tr>



<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $certificado['iddocumento']);  ?></td>
</tr>




 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('certificado','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
