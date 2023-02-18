<?php echo form_open('horasasignatura/save_edit') ?>
<?php echo form_hidden('idhorasasignatura',$horasasignatura['idhorasasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id horasasignatura</td>
     <td><?php 


$eys_arrinput=array('name'=>'idhorasasignatura','value'=>$horasasignatura['idhorasasignatura'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $horasasignatura['idpersona']);  ?></td>
</tr>



<tr>
      <td>Nombre:</td>
      <td><?php echo form_input( array("name"=>'nombre',"id"=>'nombre',"value"=>$horasasignatura['nombre'],'type'=>'text','placeholder'=>'nombre del horasasignatura')); ?></td>
  </tr>


<tr>
<td> Estado del horasasignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($horasasignatura_estados as $row){
	$options[$row->idhorasasignatura_estado]= $row->nombre;
}

 echo form_dropdown("idhorasasignatura_estado",$options, $horasasignatura['idhorasasignatura_estado']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('horasasignatura','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
