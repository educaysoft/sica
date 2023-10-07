<?php echo form_open('vinculopersona/save_edit') ?>
<?php echo form_hidden('idvinculopersona',$vinculopersona['idvinculopersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id vinculopersona</td>
     <td><?php 


$eys_arrinput=array('name'=>'idvinculopersona','value'=>$vinculopersona['idvinculopersona'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $vinculopersona['idpersona']);  ?></td>
</tr>



<tr>
      <td>Nombre:</td>
      <td><?php echo form_input( array("name"=>'nombre',"id"=>'nombre',"value"=>$vinculopersona['nombre'],'type'=>'text','placeholder'=>'nombre del vinculopersona')); ?></td>
  </tr>


<tr>
<td> Estado del vinculopersona:</td>
<td><?php
$options= array('--Select--');
foreach ($vinculopersona_estados as $row){
	$options[$row->idvinculopersona_estado]= $row->nombre;
}

 echo form_dropdown("idvinculopersona_estado",$options, $vinculopersona['idvinculopersona_estado']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('vinculopersona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
