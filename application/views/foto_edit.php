<?php echo form_open('foto/save_edit') ?>
<?php echo form_hidden('idfoto',$foto['idfoto']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>






 
 <tr>
      <td>Descripción:</td>
      <td><?php echo form_input('descripcion',$foto['descripcion'],array('placeholder'=>'Descripcion de la foto')) ?></td>
  </tr>

<tr>
      <td>Detalle:</td>
      <td><?php echo form_input('detalle',$foto['detalle'],array('placeholder'=>'Detalle de a foto')) ?></td>
  </tr>


<tr>
      <td>Archivo:</td>
      <td><?php echo form_input('archivo',$foto['archivo'],array('placeholder'=>'Archivo de la foto')) ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('foto','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
