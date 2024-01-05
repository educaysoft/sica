<?php echo form_open('documentosilabo/save_edit') ?>
<?php echo form_hidden('iddocumentosilabo',$documentosilabo['iddocumentosilabo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id documentosilabo</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddocumentosilabo','value'=>$documentosilabo['iddocumentosilabo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 








<tr>
<td> Silabo:</td>
<td><?php
$options= array('--Select--');
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}

 echo form_dropdown("idsilabo",$options, $documentosilabo['idsilabo']);  ?></td>
</tr>


<tr>
<td> Tipo de documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

 echo form_dropdown("idtipodocu",$options, $documentosilabo['idtipodocu'],array('id'=>'idtipodocu'));  ?></td>
</tr>




 <tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->iddocumento.' - '.$row->asunto;
}

 echo form_dropdown("iddocumento",$options, $documentosilabo['iddocumento']);  ?></td>
</tr>









 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('documentosilabo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
