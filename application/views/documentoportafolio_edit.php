<?php echo form_open('documentoportafolio/save_edit') ?>
<?php echo form_hidden('iddocumentoportafolio',$documentoportafolio['iddocumentoportafolio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id documentoportafolio</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddocumentoportafolio','value'=>$documentoportafolio['iddocumentoportafolio'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Documentos:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->eldocumento;
}

 echo form_dropdown("iddocumento",$options, $documentoportafolio['iddocumento']);  ?></td>
</tr>

<tr>
<td> Portafolio:</td>
<td><?php
$options= array('--Select--');
foreach ($portafolios as $row){
	$options[$row->idportafolio]= $row->lapersona." - ".$row->elperiodo;
}

 echo form_dropdown("idportafolio",$options, $documentoportafolio['idportafolio']);  ?></td>
</tr>



 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('documentoportafolio','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
