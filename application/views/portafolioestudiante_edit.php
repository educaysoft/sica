<?php echo form_open('portafolioestudiante/save_edit') ?>
<?php echo form_hidden('idportafolioestudiante',$portafolioestudiante['idportafolioestudiante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id portafolioestudiante</td>
     <td><?php 


$eys_arrinput=array('name'=>'idportafolioestudiante','value'=>$portafolioestudiante['idportafolioestudiante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php

$options= array('--Select--');
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}



 echo form_dropdown("idestudiante",$options, $portafolioestudiante['idestudiante']);  ?></td>
</tr>

<tr>
<td> Documento de portafolio:</td>
<td><?php
$options= array('--Select--');
foreach ($portafoliomodelo as $row){
	$options[$row->idportafoliomodelo]= $row->nombre;
}

 echo form_dropdown("idportafoliomodelo",$options, $portafolioestudiante['idportafoliomodelo']);  ?></td>
</tr>





<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $portafolioestudiante['iddocumento']);  ?></td>
</tr>


<tr>
<td> Estado del portafolioestudiante:</td>
<td><?php
$options= array('--Select--');
foreach ($estado_portafolios as $row){
	$options[$row->idestado_portafolio]= $row->nombre;
}

 echo form_dropdown("idestado_portafolio",$options, $portafolioestudiante['idestado_portafolio']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('portafolioestudiante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
