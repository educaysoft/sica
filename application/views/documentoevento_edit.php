<?php echo form_open('documentoevento/save_edit') ?>
<?php echo form_hidden('iddocumentoevento',$documentoevento['iddocumentoevento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id documentoevento</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddocumentoevento','value'=>$documentoevento['iddocumentoevento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 








<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->idevento.' - '.$row->titulo;
}

 echo form_dropdown("idevento",$options, $documentoevento['idevento']);  ?></td>
</tr>


<tr>
<td> Tipo de documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

 echo form_dropdown("idtipodocu",$options, $documentoevento['idtipodocu'],array('id'=>'idtipodocu'));  ?></td>
</tr>




 <tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->iddocumento.' - '.$row->asunto;
}

 echo form_dropdown("iddocumento",$options, $documentoevento['iddocumento']);  ?></td>
</tr>









 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('documentoevento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
