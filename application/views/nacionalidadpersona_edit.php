<?php echo form_open('nacionalidadpersona/save_edit') ?>
<?php echo form_hidden('idnacionalidadpersona',$nacionalidadpersona['idnacionalidadpersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id nacionalidadpersona</td>
     <td><?php 


$eys_arrinput=array('name'=>'idnacionalidadpersona','value'=>$nacionalidadpersona['idnacionalidadpersona'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $nacionalidadpersona['idpersona']);  ?></td>
</tr>

<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($nacionalidads as $row){
	$options[$row->idnacionalidad]= $row->nombre;
}

 echo form_dropdown("idnacionalidad",$options, $nacionalidadpersona['idnacionalidad']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$nacionalidadpersona['fechadesde'],'placeholder'=>'fechadesde'i,"type"=>"date")); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('nacionalidadpersona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
