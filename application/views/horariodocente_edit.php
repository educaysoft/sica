<?php echo form_open('horariodocente/save_edit') ?>
<?php echo form_hidden('idhorariodocente',$horariodocente['idhorariodocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id horariodocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idhorariodocente','value'=>$horariodocente['idhorariodocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

 echo form_dropdown("iddocente",$options, $horariodocente['iddocente']);  ?></td>
</tr>

<tr>
<td> Periodo académico:</td>
<td><?php
$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown("idperiodoacademico",$options, $horariodocente['idperiodoacademico']);  ?></td>
</tr>



 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('horariodocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
