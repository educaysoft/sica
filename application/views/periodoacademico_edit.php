<?php echo form_open('periodoacademico/save_edit') ?>
<?php echo form_hidden('idperiodoacademico',$periodoacademico['idperiodoacademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
    
  <tr>
      <td>Nombre largo:</td>
      <td><?php
 
$eys_arrinput=array('namelargo'=>'nombrelargo','value'=>$periodoacademico['nombrelargo'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Nombre corto:</td>
      <td><?php
 
$eys_arrinput=array('namecorto'=>'nombrecorto','value'=>$periodoacademico['nombrecorto'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
      <td>Fecha inicio :</td>
      <td><?php echo form_input( array("name"=>'fechainicio',"id"=>'fechainicio',"value"=>$periodoacademico['fechainicio'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>




<tr>
      <td>Fecha fin :</td>
      <td><?php echo form_input( array("name"=>'fechafin',"id"=>'fechafin',"value"=>$periodoacademico['fechafin'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>





<tr>
<td> Depart/carrara:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $periodoacademico['iddepartamento']);  ?></td>
</tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('periodoacademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
