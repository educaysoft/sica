<?php echo form_open('reactivo/save_edit') ?>
<?php echo form_hidden('idreactivo',$reactivo['idreactivo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$reactivo['nombre'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>
 <tr>
      <td>Detalle:</td>
      <td><?php echo form_input('detalle',$reactivo['detalle'],array('placeholder'=>'Detalle de la Reactivo')) ?></td>
  </tr>
 

<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $reactivo['idevento']);  ?></td>
</tr>


<tr>
      <td>Fecha:</td>
      <td><?php echo form_input('fecha',$reactivo['fecha'],array('type'=>'date','placeholder'=>'fecha')) ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('reactivo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
