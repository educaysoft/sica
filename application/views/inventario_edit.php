<?php echo form_open('inventario/save_edit') ?>
<?php echo form_hidden('idinventario',$inventario['idinventario']) ?>
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
 	echo form_dropdown("idinstitucion",$options, $inventario['idinstitucion']);  ?></td>
	</tr>
  
  <tr>
      <td>Nombre de la inventario:</td>
      <td><?php echo form_input('nombre',$inventario['nombre'],array('placeholder'=>'Nombre de Inventario')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('inventario','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
