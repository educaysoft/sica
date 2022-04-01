<?php echo form_open('videotutorial/save_edit') ?>
<?php echo form_hidden('idvideotutorial',$videotutorial['idvideotutorial']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>


<tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$videotutorial['nombre'],array('placeholder'=>'Nombre de videotutorial','style'=>"width:500px;")) ?></td>
</tr>

 <tr>
      <td>Enlace:</td>
      <td><?php echo form_input('enlace',$videotutorial['enlace'],array('placeholder'=>'Nombre de videotutorial','style'=>"width:500px;")) ?></td>
</tr> 


<tr>
      <td>Duración::</td>
      <td><?php echo form_input('duracion',$videotutorial['duracion'],array('placeholder'=>'Nombre de videotutorial')) ?></td>
</tr>



 <tr>
<td> Instructor:</td>
<td><?php
$options= array('--Select--');
foreach ($instructores as $row){
	$options[$row->idinstructor]= $row->elinstructor;
}

 echo form_dropdown("idinstructor",$options, $videotutorial['idinstructor']);  ?></td>
</tr>

<tr>
<td> Evaluación:</td>
<td><?php
$options= array('--Select--');
foreach ($evaluaciones as $row){
	$options[$row->idevaluacion]= $row->nombre;
}

 echo form_dropdown("idevaluacion",$options, $videotutorial['idevaluacion']);  ?></td>
</tr>



  

 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('videotutorial','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
