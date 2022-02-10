<?php echo form_open('telefono/save_edit') ?>
<?php echo form_hidden('idtelefono',$telefono['idtelefono']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id telefono</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtelefono','value'=>$telefono['idtelefono'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $telefono['idpersona']);  ?></td>
</tr>

<tr>
<td> Operadora:</td>
<td><?php
$options= array('--Select--');
foreach ($operadoras as $row){
	$options[$row->idoperadora]= $row->nombre;
}

 echo form_dropdown("idoperadora",$options, $telefono['idoperadora']);  ?></td>
</tr>

<tr>
      <td>Número:</td>
      <td><?php echo form_input( array("name"=>'numero',"id"=>'numero',"value"=>$telefono['numero'],'type'=>'text','placeholder'=>'numero')); ?></td>
  </tr>


<tr>
<td> Estado del telefono:</td>
<td><?php
$options= array('--Select--');
foreach ($telefono_estados as $row){
	$options[$row->idtelefono_estado]= $row->nombre;
}

 echo form_dropdown("idtelefono_estado",$options, $telefono['idtelefono_estado']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('telefono','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
