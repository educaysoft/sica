<?php echo form_open('unidadsilabo/save_edit') ?>
<?php echo form_hidden('idunidadsilabo',$unidadsilabo['idunidadsilabo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id unidadsilabo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idunidadsilabo','value'=>$unidadsilabo['idunidadsilabo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
     <td>No. Unidad:</td>
     <td><?php 


$eys_arrinput=array('name'=>'unidad','value'=>$unidadsilabo['unidad'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
     <td>Nombre:</td>
     <td><?php 


$eys_arrinput=array('name'=>'nombre','value'=>$unidadsilabo['nombre'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
<td> Silabo:</td>
<td><?php
$options= array('--Select--');
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}

 echo form_dropdown("idsilabo",$options, $unidadsilabo['idsilabo']);  ?></td>
</tr>

 
 









 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('unidadsilabo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
