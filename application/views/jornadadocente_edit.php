<?php echo form_open('jornadadocente/save_edit') ?>
<?php echo form_hidden('idjornadadocente',$jornadadocente['idjornadadocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id jornadadocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idjornadadocente','value'=>$jornadadocente['idjornadadocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

 echo form_dropdown("iddocente",$options, $jornadadocente['iddocente']);  ?></td>
</tr>

<tr>
<td> Periodo académico:</td>
<td><?php
$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown("idperiodoacademico",$options, $jornadadocente['idperiodoacademico']);  ?></td>
</tr>



 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('jornadadocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
