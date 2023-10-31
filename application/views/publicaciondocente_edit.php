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
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("iddocente",$options, $publicaciondocente['iddocente']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipopublicaciondocentes as $row){
	$options[$row->idtipopublicaciondocente]= $row->nombre;
}

 echo form_dropdown("idtipopublicaciondocente",$options, $publicaciondocente['idtipopublicaciondocente']);  ?></td>
</tr>

<tr>
      <td>Titulo:</td>
<?php $textarea_options = array('class' => 'form-control','rows' => '4', 'cols' => '20', 'style'=> 'width:500px;height:100px;'); ?>    
      <td><?php echo form_textarea('titulo',$publicaciondocente['titulo'],$textarea_options);    ?></td>
  </tr>

<tr>
      <td>Dirección web:</td>

<?php $textarea_options = array('class' => 'form-control','rows' => '4', 'cols' => '20', 'style'=> 'width:500px;height:100px;',"name"=>'url',"id"=>'url',"value"=>$publicaciondocente['url'],); ?>    
      <td><?php echo form_textarea($textarea_options); ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('publicaciondocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
