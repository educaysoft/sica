<?php echo form_open('estudiante/save_edit') ?>
<?php echo form_hidden('idestudiante',$estudiante['idestudiante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estudiante</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestudiante','value'=>$estudiante['idestudiante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $estudiante['idpersona']);  ?></td>
</tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $estudiante['idinstitucion']);  ?></td>
</tr>

<tr>
      <td>Fecha de registro:</td>
      <td><?php echo form_input( array("name"=>'nivel',"id"=>'nivel',"value"=>$estudiante['nivel'],'type'=>'text','placeholder'=>'nivel')); ?></td>

  </tr>


<tr>
      <td>Fecha de registro:</td>
      <td><?php echo form_input( array("name"=>'fecharegistro',"id"=>'fecharegistro',"value"=>$estudiante['fecharegistro'],'type'=>'date','placeholder'=>'fecharegistro')); ?></td>

  </tr>

<tr>
<td>Número de registro:</td>
<td><?php echo form_input( array("name"=>'numeroregistro',"id"=>'numeroregistro',"value"=>$estudiante['numeroregistro'],'type'=>'text','placeholder'=>'numeroregistro')); ?></td>

</tr>



 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estudiante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
