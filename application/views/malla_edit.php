<?php echo form_open('malla/save_edit') ?>
<?php echo form_hidden('idmalla',$malla['idmalla']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>

<tr>
<td> Departamento/carrera:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $malla['iddepartamento']);  ?></td>
</tr>



    
  <tr>
      <td>Nombre corto:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombrecorto','value'=>$malla['nombrecorto'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Nombre largo:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombrelargo','value'=>$malla['nombrelargo'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Fecha inicio :</td>
      <td><?php echo form_input( array("name"=>'fechainicio',"id"=>'fechainicio',"value"=>$malla['fechainicio'],'type'=>'date','placeholder'=>'fecha de ')); ?></td>
  </tr>

<tr>
      <td>Fecha fin :</td>
      <td><?php echo form_input( array("name"=>'fechafin',"id"=>'fechafin',"value"=>$malla['fechafin'],'type'=>'date','placeholder'=>'fecha de ')); ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('malla','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
