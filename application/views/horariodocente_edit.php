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
	$options[$row->iddocente]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("iddocente",$options, $horariodocente['iddocente']);  ?></td>
</tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($periodoacademicoes as $row){
	$options[$row->idperiodoacademico]= $row->nombre;
}

 echo form_dropdown("idperiodoacademico",$options, $horariodocente['idperiodoacademico']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'fechainscripcion',"id"=>'fechainscripcion',"value"=>$horariodocente['fechainscripcion'],'type'=>'date','placeholder'=>'fechainscripcion')); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('horariodocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
