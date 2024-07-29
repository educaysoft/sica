<?php echo form_open('documentoexamencomplexivo/save_edit') ?>
<?php echo form_hidden('iddocumentoexamencomplexivo',$documentoexamencomplexivo['iddocumentoexamencomplexivo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id documentoexamencomplexivo</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddocumentoexamencomplexivo','value'=>$documentoexamencomplexivo['iddocumentoexamencomplexivo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Documentos:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]=$row->iddocumento.' - '.$row->autor." - ". $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $documentoexamencomplexivo['iddocumento']);  ?></td>
</tr>

<tr>
<td> Portafolio:</td>
<td><?php
$options= array('--Select--');
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->idtrabajointegracioncurricular." - ".$row->nombre;
}

 echo form_dropdown("idtrabajointegracioncurricular",$options, $documentoexamencomplexivo['idtrabajointegracioncurricular']);  ?></td>
</tr>


<tr>
<td> Actividad academica: </td>
<td><?php 

$options= array('--Select--');
foreach ($docenteactividadacademicas as $row){
	$options[$row->iddocenteactividadacademica]=$row->item." - ". $row->eldistributivodocente." - ".$row->nombreactividad." - (".$row->numerohoras.")";
}

 echo form_dropdown("iddocenteactividadacademica",$options,$documentoexamencomplexivo['iddocenteactividadacademica']);  ?></td>
</tr>

<tr>
<td> Minutos ocupados: </td>
<td><?php echo form_input("minutosocupados",$documentoexamencomplexivo['minutosocupados'], array("placeholder"=>"Minutos utilizados"))  ?></td>
</tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('documentoexamencomplexivo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
