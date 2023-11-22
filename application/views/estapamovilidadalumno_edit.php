<?php echo form_open('estapamovilidadalumno/save_edit') ?>
<?php echo form_hidden('idestapamovilidadalumno',$estapamovilidadalumno['idestapamovilidadalumno']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estapamovilidadalumno</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestapamovilidadalumno','value'=>$estapamovilidadalumno['idestapamovilidadalumno'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($alumnos as $row){
	$options[$row->idalumno]= $row->elalumno;
}

 echo form_dropdown("idalumno",$options, $estapamovilidadalumno['idalumno']);  ?></td>
</tr>

<tr>
<td> Departamento:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $estapamovilidadalumno['iddepartamento']);  ?></td>
</tr>

<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$estapamovilidadalumno['fechadesde'],'placeholder'=>'fechadesde',"type"=>"date")); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estapamovilidadalumno','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
