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
	$options[$row->idpagador]= $row->elpagador;
}

 echo form_dropdown("idpagador",$options, $contabilidad['idpagador']);  ?></td>
</tr>

<tr>
      <td>fecha contabilidad:</td>
      <td><?php echo form_input( array("name"=>'fechacontabilidad',"id"=>'fechacontabilidad',"value"=>$contabilidad['fechacontabilidad'],'type'=>'date','placeholder'=>'fechacontabilidad')); ?></td>
  </tr>

<tr>
      <td>VAlor:</td>
      <td><?php echo form_input( array("name"=>'valor',"id"=>'valor',"value"=>$contabilidad['valor'],'type'=>'text','placeholder'=>'fechacontabilidad')); ?></td>
  </tr>


<tr>
  <td>Detalle:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion","id" =>"detalle");    
echo form_textarea('detalle',$contabilidad['detalle'],$textarea_options ); ?></td>
</tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('contabilidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
