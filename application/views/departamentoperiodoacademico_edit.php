<?php echo form_open('departamentoperiodoacademico/save_edit') ?>
<?php echo form_hidden('iddepartamentoperiodoacademico',$departamentoperiodoacademico['iddepartamentoperiodoacademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id departamentoperiodoacademico</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddepartamentoperiodoacademico','value'=>$departamentoperiodoacademico['iddepartamentoperiodoacademico'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
     <td>No. Unidad:</td>
     <td><?php 


$eys_arrinput=array('name'=>'unidad','value'=>$departamentoperiodoacademico['unidad'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
     <td>Nombre:</td>
     <td><?php 


$eys_arrinput=array('name'=>'nombre','value'=>$departamentoperiodoacademico['nombre'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
<td> Curso:</td>
<td><?php
$options= array('--Select--');
foreach ($cursos as $row){
	$options[$row->idcurso]= $row->nombre;
}

 echo form_dropdown("idcurso",$options, $departamentoperiodoacademico['idcurso']);  ?></td>
</tr>

 
 <tr>
<td> Videotutorial:</td>
<td><?php
$options= array('--Select--');
foreach ($videotutorials as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}

 echo form_dropdown("idvideotutorial",$options, $departamentoperiodoacademico['idvideotutorial']);  ?></td>
</tr>









 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('departamentoperiodoacademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
