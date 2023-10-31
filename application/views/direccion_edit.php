<?php echo form_open('direccion/save_edit') ?>
<?php echo form_hidden('iddireccion',$direccion['iddireccion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id direccion</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddireccion','value'=>$direccion['iddireccion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $direccion['idpersona']);  ?></td>
</tr>



<tr>
      <td>Nombre:</td>
      <td><?php echo form_input( array("name"=>'nombre',"id"=>'nombre',"value"=>$direccion['nombre'],'type'=>'text','placeholder'=>'nombre del direccion')); ?></td>
  </tr>


<tr>
<td> Estado del direccion:</td>
<td><?php
$options= array('--Select--');
foreach ($codigopostales as $row){
	$options[$row->idcodigopostal]= $row->nombre;
}

 echo form_dropdown("idcodigopostal",$options, $direccion['idcodigopostal']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('direccion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
