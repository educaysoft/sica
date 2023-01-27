<?php echo form_open('paispersona/save_edit') ?>
<?php echo form_hidden('idpaispersona',$paispersona['idpaispersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id paispersona</td>
     <td><?php 


$eys_arrinput=array('name'=>'idpaispersona','value'=>$paispersona['idpaispersona'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $paispersona['idpersona']);  ?></td>
</tr>

<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($paises as $row){
	$options[$row->idpais]= $row->nombre;
}

 echo form_dropdown("idpais",$options, $paispersona['idpais']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$paispersona['fechadesde'],'placeholder'=>'fechadesde',"type"=>"date")); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('paispersona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
