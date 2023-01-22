<?php echo form_open('persona/save_edit') ?>
<?php echo form_hidden('idpersona',$persona['idpersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id persona</td>
     <td><?php 


$eys_arrinput=array('name'=>'idpersona','value'=>$persona['idpersona'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
      <td>Cédula:</td>
      <td><?php
       $eys_arrinput=array('name'=>'cedula','value'=>$persona['cedula'], "style"=>"width:500px");
      echo form_input($eys_arrinput); ?></td>
</tr>


<tr>
      <td>Nombres:</td>
      <td><?php
       $eys_arrinput=array('name'=>'nombres','value'=>$persona['nombres'], "style"=>"width:500px");
      echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
      <td>Apellidos:</td>
      <td><?php
       $eys_arrinput=array('name'=>'apellidos','value'=>$persona['apellidos'], "style"=>"width:500px");
      echo form_input($eys_arrinput); ?></td>
</tr>
 

 <tr>
      <td>Fecha Nacimiento:</td>
      <td><?php echo form_input( array("name"=>'fechanacimiento',"id"=>'fechanacimiento',"value"=>$persona['fechanacimiento'],'type'=>'date','placeholder'=>'fechanacimiento')); ?></td>
  </tr>


<tr>
      <td>Archivo de foto:</td>
      <td><?php
       $eys_arrinput=array('name'=>'foto','value'=>$persona['foto'], "style"=>"width:500px");
      echo form_input($eys_arrinput); ?></td>
</tr>
 
 <tr>
<td> Genero:</td>
<td><?php
$options= array('--Select--');
foreach ($sexos as $row){
	$options[$row->idsexo]= $row->nombre;
}

 echo form_dropdown("idsexo",$options, $persona['idsexo']);  ?></td>
</tr>



 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('persona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
