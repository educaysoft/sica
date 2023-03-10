<?php echo form_open('evaluacion/save_edit') ?>
<?php echo form_hidden('idevaluacion',$evaluacion['idevaluacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$evaluacion['nombre'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>
 <tr>
      <td>Detalle:</td>
      <td><?php echo form_input('detalle',$evaluacion['detalle'],array('placeholder'=>'Detalle de la Evaluacion')) ?></td>
  </tr>
 

<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $evaluacion['idevento']);  ?></td>
</tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('evaluacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
