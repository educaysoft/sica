<?php echo form_open('unidad/save_edit') ?>
<?php echo form_hidden('idunidad',$unidad['idunidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>

 	<tr>
	<td> Institucion:</td>
	<td><?php
		$options= array('--Select--');
		foreach ($instituciones as $row){
			$options[$row->idinstitucion]= $row->nombre;
		}
 	echo form_dropdown("idinstitucion",$options, $unidad['idinstitucion']);  ?></td>
	</tr>
  
  <tr>
      <td>Nombre de la unidad:</td>
      <td><?php echo form_input('nombre',$unidad['nombre'],array('placeholder'=>'Nombre de Unidad')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('unidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
