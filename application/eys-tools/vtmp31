<?php echo form_open('cinturon/save_edit') ?>
<?php echo form_hidden('idcinturon',$cinturon['idcinturon']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 <tr>
<td> Evaluacion:</td>
<td><?php
$options= array('--Select--');
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

 echo form_dropdown("idarticulo",$options, $cinturon['idarticulo']);  ?></td>
</tr>


  
  <tr>
      <td>Color:</td>
      <td><?php echo form_input('color',$cinturon['color'],array('placeholder'=>'Color')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('cinturon','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
