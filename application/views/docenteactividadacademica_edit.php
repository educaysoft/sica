<?php echo form_open('docenteactividadacademica/save_edit') ?>
<?php echo form_hidden('iddocenteactividadacademica',$docenteactividadacademica['iddocenteactividadacademica']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id docenteactividadacademica</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddocenteactividadacademica','value'=>$docenteactividadacademica['iddocenteactividadacademica'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($distributivodocentes as $row){
	$options[$row->iddistributivodocente]= $row->eldistributivodocente;
}


 echo form_dropdown("iddistributivodocente",$options, $docenteactividadacademica['iddistributivodocente']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($actividadacademicas as $row){
	$options[$row->idactividadacademica]= $row->nombre;
}
 echo form_dropdown("idactividadacademica",$options, $docenteactividadacademica['idactividadacademica']);  ?></td>
</tr>

<tr>
      <td>Número de horas:</td>
<?php $textarea_options = array('class' => 'form-control',  'style'=> 'width:500px;'); ?>    
      <td><?php echo form_input('numerohoras',$docenteactividadacademica['numerohoras'],$textarea_options);    ?></td>
  </tr>


<tr>
      <td>Detalle:</td>
<?php $textarea_options = array('class' => 'form-control',  'style'=> 'width:500px;'); ?>    
      <td><?php echo form_input('detalle',$docenteactividadacademica['detalle'],$textarea_options);    ?></td>
  </tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('docenteactividadacademica','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
