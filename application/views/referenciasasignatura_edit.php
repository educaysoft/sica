<?php echo form_open('referenciasasignatura/save_edit') ?>
<?php echo form_hidden('idreferenciasasignatura',$referenciasasignatura['idreferenciasasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id referenciasasignatura</td>
     <td><?php 


$eys_arrinput=array('name'=>'idreferenciasasignatura','value'=>$referenciasasignatura['idreferenciasasignatura'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $referenciasasignatura['idasignatura']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tiporeferenciasasignaturas as $row){
	$options[$row->idtiporeferenciasasignatura]= $row->nombre;
}

 echo form_dropdown("idtiporeferenciasasignatura",$options, $referenciasasignatura['idtiporeferenciasasignatura']);  ?></td>
</tr>

<tr>
      <td>Titulo:</td>
<?php $textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;'); ?>    
      <td><?php echo form_textarea('titulo',$referenciasasignatura['titulo'],$textarea_options);    ?></td>
  </tr>

<tr>
      <td>Dirección web:</td>

<?php $textarea_options = array('class' => 'form-control','rows' => '4', 'cols' => '20', 'style'=> 'width:500px;height:100px;',"name"=>'url',"id"=>'url',"value"=>$referenciasasignatura['url'],); ?>    
      <td><?php echo form_textarea($textarea_options); ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('referenciasasignatura','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
