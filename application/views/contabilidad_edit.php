<?php echo form_open('contabilidad/save_edit') ?>
<?php echo form_hidden('idcontabilidad',$contabilidad['idcontabilidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id contabilidad</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcontabilidad','value'=>$contabilidad['idcontabilidad'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Beneficiario:</td>
<td><?php
$options= array('--Select--');
foreach ($beneficiarios as $row){
	$options[$row->idbeneficiario]= $row->elbeneficiario;
}

 echo form_dropdown("idbeneficiario",$options, $contabilidad['idbeneficiario']);  ?></td>
</tr>

<tr>
<td> Pagador:</td>
<td><?php
$options= array('--Select--');
foreach ($pagadores as $row){
	$options[$row->idpagador]= $row->nombre;
}

 echo form_dropdown("idpagadora",$options, $contabilidad['idpagadora']);  ?></td>
</tr>

<tr>
      <td>Número:</td>
      <td><?php echo form_input( array("name"=>'numero',"id"=>'numero',"value"=>$contabilidad['numero'],'type'=>'text','placeholder'=>'numero')); ?></td>
  </tr>


<tr>
<td> Estado del contabilidad:</td>
<td><?php
$options= array('--Select--');
foreach ($contabilidad_estados as $row){
	$options[$row->idcontabilidad_estado]= $row->nombre;
}

 echo form_dropdown("idcontabilidad_estado",$options, $contabilidad['idcontabilidad_estado']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('contabilidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
