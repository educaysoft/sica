<?php echo form_open('distributivodocente/save_edit') ?>
<?php echo form_hidden('iddistributivodocente',$distributivodocente['iddistributivodocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id distributivodocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddistributivodocente','value'=>$distributivodocente['iddistributivodocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Docente:</td>
<td><?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

 echo form_dropdown("iddocente",$options, $distributivodocente['iddocente']);  ?></td>
</tr>

<tr>
<td> Distributivo:</td>
<td><?php
$options= array('--Select--');
foreach ($distributivos as $row){
	$options[$row->iddistributivo]= $row->eldistributivo;
}

 echo form_dropdown("iddistributivo",$options, $distributivodocente['iddistributivo']);  ?></td>
</tr>


<tr>
<td> Tiempo dedicación:</td>
<td><?php
$options= array('--Select--');
foreach ($tiempodedicacions as $row){
	$options[$row->idtiempodedicacion]= $row->nombre;
}

 echo form_dropdown("idtiempodedicacion",$options, $distributivodocente['idtiempodedicacion']);  ?></td>
</tr>






 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('distributivodocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
