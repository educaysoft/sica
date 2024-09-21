<?php echo form_open('seguimientosilabo/save_edit') ?>
<?php echo form_hidden('idseguimientosilabo',$seguimientosilabo['idseguimientosilabo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id seguimientosilabo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idseguimientosilabo','value'=>$seguimientosilabo['idseguimientosilabo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 








<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $seguimientosilabo['idevento']);  ?></td>
</tr>

 
 <tr>
<td> Criterio:</td>
<td><?php
$options= array('--Select--');
foreach ($criterioseguimientosilabos as $row){
	$options[$row->idcriterioseguimientosilabo]= $row->nombre;
}

 echo form_dropdown("idcriterioseguimientosilabo",$options, $seguimientosilabo['idcriterioseguimientosilabo']);  ?></td>
</tr>


<tr>
<td> Valor Criterio:</td>
<td><?php
$options= array('--Select--');
foreach ($valorcriterioseguimientosilabos as $row){
	$options[$row->idvalorcriterioseguimientosilabo]= $row->nombre;
}

 echo form_dropdown("idvalorcriterioseguimientosilabo",$options, $seguimientosilabo['idvalorcriterioseguimientosilabo']);  ?></td>
</tr>






 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('seguimientosilabo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
