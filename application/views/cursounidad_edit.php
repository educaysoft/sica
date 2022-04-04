<?php echo form_open('cursounidad/save_edit') ?>
<?php echo form_hidden('idcursounidad',$cursounidad['idcursounidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id cursounidad</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcursounidad','value'=>$cursounidad['idcursounidad'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
     <td>No. Unidad:</td>
     <td><?php 


$eys_arrinput=array('name'=>'unidad','value'=>$cursounidad['unidad'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
     <td>Nombre:</td>
     <td><?php 


$eys_arrinput=array('name'=>'nombre','value'=>$cursounidad['nombre'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
<td> Curso:</td>
<td><?php
$options= array('--Select--');
foreach ($cursos as $row){
	$options[$row->idcurso]= $row->nombre;
}

 echo form_dropdown("idcurso",$options, $cursounidad['idcurso']);  ?></td>
</tr>

 
 <tr>
<td> Videotutorial:</td>
<td><?php
$options= array('--Select--');
foreach ($videotutorials as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}

 echo form_dropdown("idvideotutorial",$options, $cursounidad['idvideotutorial']);  ?></td>
</tr>









 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('cursounidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
