<?php echo form_open('pregunta/save_edit') ?>
<?php echo form_hidden('idpregunta',$pregunta['idpregunta']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 <tr>
<td> Reactivo:</td>
<td><?php
$options= array('--Select--');
foreach ($reactivos as $row){
	$options[$row->idreactivo]= $row->nombre;
}

 echo form_dropdown("idreactivo",$options, $pregunta['idreactivo']);  ?></td>
</tr>


  
  <tr>
      <td>Pregunta:</td>
      <td><?php echo form_input('pregunta',$pregunta['pregunta'],array('placeholder'=>'Pregunta')) ?></td>
  </tr>
 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('pregunta','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
