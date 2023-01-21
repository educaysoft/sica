<?php echo form_open('identidad/save_edit') ?>
<?php echo form_hidden('ididentidad',$identidad['ididentidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id identidad</td>
     <td><?php 


$eys_arrinput=array('name'=>'ididentidad','value'=>$identidad['ididentidad'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $identidad['idpersona']);  ?></td>
</tr>

<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocumentos as $row){
	$options[$row->idtipodocumento]= $row->nombre;
}

 echo form_dropdown("idtipodocumento",$options, $identidad['idtipodocumento']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'identidad',"id"=>'identidad',"value"=>$identidad['identidad'],'placeholder'=>'identidad')); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('identidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
