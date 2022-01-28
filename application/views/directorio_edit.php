<?php echo form_open('directorio/save_edit') ?>
<?php echo form_hidden('iddirectorio',$directorio['iddirectorio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>


 <tr>
<td> Ordenador:</td>
<td><?php
$options= array('--Select--');
foreach ($ordenadores as $row){
	$options[$row->idordenador]= $row->nombre;
}

 echo form_dropdown("idordenador",$options, $directorio['idordenador']);  ?></td>
</tr>
  
  <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$directorio['nombre'],array('placeholder'=>'Nombre de directorio')) ?></td>
  </tr>

<tr>
      <td>Ruta:</td>
      <td><?php echo form_input('ruta',$directorio['ruta'],array('placeholder'=>'Ruta')) ?></td>
  </tr>

<tr>
      <td>Descripción:</td>
      <td><?php echo form_textarea('descripcion',$directorio['descripcion'],array('placeholder'=>'Descripcion')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('directorio','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
