<?php echo form_open('portafoliodocente/save_edit') ?>
<?php echo form_hidden('idportafoliodocente',$portafoliodocente['idportafoliodocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id portafoliodocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idportafoliodocente','value'=>$portafoliodocente['idportafoliodocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php

$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}



 echo form_dropdown("iddocente",$options, $portafoliodocente['iddocente']);  ?></td>
</tr>

<tr>
<td> Documento de portafolio:</td>
<td><?php
$options= array('--Select--');
foreach ($portafoliomodelos as $row){
	$options[$row->idportafoliomodelo]= $row->nombre;
}

 echo form_dropdown("idportafoliomodelo",$options, $portafoliodocente['idportafoliomodelo']);  ?></td>
</tr>





<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $portafoliodocente['iddocumento']);  ?></td>
</tr>


<tr>
<td> Estado del portafoliodocente:</td>
<td><?php
$options= array('--Select--');
foreach ($portafolioestados as $row){
	$options[$row->idportafolioestado]= $row->nombre;
}

 echo form_dropdown("idportafolioestado",$options, $portafoliodocente['idportafolioestado']);  ?></td>
</tr>




<tr>
<td> Periodo academico:</td>
<td><?php
$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrelargo;
}

 echo form_dropdown("idperiodoacademico",$options, $portafoliodocente['idperiodoacademico']);  ?></td>
</tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('portafoliodocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
