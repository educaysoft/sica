<?php echo form_open('articulo/save_edit') ?>
<?php echo form_hidden('idarticulo',$articulo['idarticulo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$articulo['nombre'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>

<tr>
      <td>Detalle:</td>
      <td><?php echo form_input('detalle',$articulo['detalle'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $articulo['idinstitucion']);  ?></td>
</tr>



<tr>
<td> Categoria:</td>
<td><?php
$options= array('--Select--');
foreach ($categorias as $row){
	$options[$row->idcategoria]= $row->nombre;
}

 echo form_dropdown("idcategoria",$options, $articulo['idcategoria']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('articulo','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
