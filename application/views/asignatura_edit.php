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
      <td>Detalle:</td>
      <td><?php echo form_input('detalle',$asignatura['detalle'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $asignatura['idinstitucion']);  ?></td>
</tr>



<tr>
<td> Categoria:</td>
<td><?php
$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]= $row->nombre;
}

 echo form_dropdown("idmalla",$options, $asignatura['idmalla']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('asignatura','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
