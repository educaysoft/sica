<?php echo form_open('certificado/save_edit') ?>
<?php echo form_hidden('idcertificado',$certificado['idcertificado']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id certificado</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcertificado','value'=>$certificado['idcertificado'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 






<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $certificado['idevento']);  ?></td>
</tr>



<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

 echo form_dropdown("idtipodocu",$options, $certificado['idtipodocu']);  ?></td>
</tr>



<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $certificado['iddocumento']);  ?></td>
</tr>


<tr>
     <td>Ancho x(296.67):</td>
     <td><?php 


$eys_arrinput=array('name'=>'ancho_x','value'=>$certificado['ancho_x'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>



<tr>
     <td>Alto y(210.56):</td>
     <td><?php 


$eys_arrinput=array('name'=>'alto_y','value'=>$certificado['alto_y'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>





<tr>
     <td>Posicion ref X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'posi_codigo_x','value'=>$certificado['posi_codigo_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Posicion ref. Y(65.00 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'posi_codigo_y','value'=>$certificado['posi_codigo_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>



<tr>
     <td>Posicion X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'posi_nomb_x','value'=>$certificado['posi_nomb_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Posicion Y(115 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'posi_nomb_y','value'=>$certificado['posi_nomb_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>



<tr>
     <td>Posicion fecha  X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'posi_fecha_x','value'=>$certificado['posi_fecha_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Posicion fecha  Y(65.00 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'posi_fecha_y','value'=>$certificado['posi_fecha_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('certificado','Atras') ?></td>
 </tr>

<tr>
  <td>Head para enviar:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correohead","id" =>"correohead");    
echo form_textarea('correohead',$certificado['correohead'],$textarea_options ); ?></td>
</tr>


<tr>
  <td>Subject:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correosubject","id" =>"correosubject");    
echo form_textarea('correosubject',$certificado['correosubject'],$textarea_options ); ?></td>
</tr>


<tr>
  <td>Foot para enviar:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correofoot","id" =>"correofoot");    
echo form_textarea('correofoot',$certificado['correofoot'],$textarea_options ); ?></td>
</tr>










</table>
<?php echo form_close(); ?>
