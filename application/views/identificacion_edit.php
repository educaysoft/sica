<?php echo form_open('identificacion/save_edit') ?>
<?php echo form_hidden('ididentificacion',$identificacion['ididentificacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id identificacion</td>
     <td><?php 


$eys_arrinput=array('name'=>'ididentificacion','value'=>$identificacion['ididentificacion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $identificacion['idpersona']);  ?></td>
</tr>

<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocumentos as $row){
	$options[$row->idtipodocumento]= $row->nombre;
}

 echo form_dropdown("idtipodocumento",$options, $identificacion['idtipodocumento']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'identificacion',"id"=>'identificacion',"value"=>$identificacion['identificacion'],'placeholder'=>'identificacion')); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('identificacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
