<?php echo form_open('movilidadalumno/save_edit') ?>
<?php echo form_hidden('idmovilidadalumno',$movilidadalumno['idmovilidadalumno']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id movilidadalumno</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmovilidadalumno','value'=>$movilidadalumno['idmovilidadalumno'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $movilidadalumno['idpersona']);  ?></td>
</tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $movilidadalumno['idinstitucion']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'fechainscripcion',"id"=>'fechainscripcion',"value"=>$movilidadalumno['fechainscripcion'],'type'=>'date','placeholder'=>'fechainscripcion')); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('movilidadalumno','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
