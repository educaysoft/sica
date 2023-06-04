<?php echo form_open('correo/save_edit') ?>
<?php echo form_hidden('idcorreo',$correo['idcorreo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id correo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcorreo','value'=>$correo['idcorreo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $correo['idpersona']);  ?></td>
</tr>



<tr>
      <td>Nombre:</td>
      <td><?php echo form_input( array("name"=>'nombre',"id"=>'nombre',"value"=>$correo['nombre'],'type'=>'text','placeholder'=>'nombre del correo')); ?></td>
  </tr>


<tr>
<td> Estado del correo:</td>
<td><?php
$options= array('--Select--');
foreach ($correo_estados as $row){
	$options[$row->idcorreo_estado]= $row->nombre;
}

 echo form_dropdown("idcorreo_estado",$options, $correo['idcorreo_estado']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('correo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
