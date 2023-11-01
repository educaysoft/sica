<?php echo form_open('publicaciondocente/save_edit') ?>
<?php echo form_hidden('idpublicaciondocente',$publicaciondocente['idpublicaciondocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id publicaciondocente</td>
     <td><?php 


$eys_arrinput=array('name'=>'idpublicaciondocente','value'=>$publicaciondocente['idpublicaciondocente'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Docente:</td>
<td><?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]=$row->eldocente;
}

 echo form_dropdown("iddocente",$options, $publicaciondocente['iddocente']);  ?></td>
</tr>

<tr>
<td> publicacion:</td>
<td><?php
$options= array('--Select--');
foreach ($publicacions as $row){
	$options[$row->idpublicacion]= $row->titulo;
}

 echo form_dropdown("idpublicacion",$options, $publicaciondocente['idpublicacion']);  ?></td>
</tr>







 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('publicaciondocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
