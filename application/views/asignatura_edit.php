<?php echo form_open('asignatura/save_edit') ?>
<?php echo form_hidden('idasignatura',$asignatura['idasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$asignatura['nombre'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>

<tr>
      <td>Creditos:</td>
      <td><?php echo form_input('creditos',$asignatura['creditos'],array('placeholder'=>'creditos de la asignatura')) ?></td>
  </tr>

<tr>
<td> Malla:</td>
<td><?php
$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]= $row->nombre;
}

 echo form_dropdown("idmalla",$options, $asignatura['idmalla']);  ?></td>
</tr>



<tr>
<td> Nivel:</td>
<td><?php
$options= array('--Select--');
foreach ($nivelacademicos as $row){
	$options[$row->idnivelacademico]= $row->nombre;
}

 echo form_dropdown("idnivelacademico",$options, $asignatura['idnivelacademico']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('asignatura','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
