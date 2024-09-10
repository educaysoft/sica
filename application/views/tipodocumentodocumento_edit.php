<?php echo form_open('tipodocumentodocumento/save_edit') ?>
<?php echo form_hidden('idtipodocumentodocumento',$tipodocumentodocumento['idtipodocumentodocumento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tipodocumentodocumento</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtipodocumentodocumento','value'=>$tipodocumentodocumento['idtipodocumentodocumento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Documentos:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]=$row->iddocumento.' - '.$row->autor." - ". $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $tipodocumentodocumento['iddocumento']);  ?></td>
</tr>

<tr>
<td> Portafolio:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocumentos as $row){
	$options[$row->idtipodocumento]= $row->idtipodocumento." - ".$row->nombre;
}

 echo form_dropdown("idtipodocumento",$options, $tipodocumentodocumento['idtipodocumento']);  ?></td>
</tr>






 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipodocumentodocumento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
