<?php echo form_open('oficio/save_edit') ?>
<?php echo form_hidden('idoficio',$oficio['idoficio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id oficio</td>
     <td><?php 


$eys_arrinput=array('name'=>'idoficio','value'=>$oficio['idoficio'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 






<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $oficio['idevento']);  ?></td>
</tr>



<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

 echo form_dropdown("idtipodocu",$options, $oficio['idtipodocu']);  ?></td>
</tr>



<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $oficio['iddocumento']);  ?></td>
</tr>


<tr>
     <td>Ancho x(296.67):</td>
     <td><?php 


$eys_arrinput=array('name'=>'ancho_x','value'=>$oficio['ancho_x'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>



<tr>
     <td>Alto y(210.56):</td>
     <td><?php 


$eys_arrinput=array('name'=>'alto_y','value'=>$oficio['alto_y'], "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>





<tr>
     <td>Posicion ref X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'posi_codigo_x','value'=>$oficio['posi_codigo_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Posicion ref. Y(65.00 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'posi_codigo_y','value'=>$oficio['posi_codigo_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>



<tr>
     <td>Posicion X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'posi_nomb_x','value'=>$oficio['posi_nomb_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Posicion Y(115 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'posi_nomb_y','value'=>$oficio['posi_nomb_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>



<tr>
     <td>Posicion fecha  X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'posi_fecha_x','value'=>$oficio['posi_fecha_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Posicion fecha  Y(65.00 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'posi_fecha_y','value'=>$oficio['posi_fecha_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>





<tr>
     <td>Primera firma  X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'firma1_x','value'=>$oficio['firma1_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Primera firma  Y(65.00 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'firma1_y','value'=>$oficio['firma1_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>


<tr>
     <td>Segunda firma  X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'firma2_x','value'=>$oficio['firma2_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Segunda firma  Y(65.00 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'firma2_y','value'=>$oficio['firma2_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>



<tr>
     <td>Tercera firma  X:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'firma3_x','value'=>$oficio['firma3_x'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
    <td>Tercera firma  Y(65.00 mm):</td>
    <td><?php 
    $eys_arrinput=array('name'=>'firma3_y','value'=>$oficio['firma3_y'], "style"=>"width:500px");
    echo form_input($eys_arrinput); ?></td>
</tr>






 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('oficio','Atras') ?></td>
 </tr>

<tr>
  <td>Head para enviar:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correohead","id" =>"correohead");    
echo form_textarea('correohead',$oficio['correohead'],$textarea_options ); ?></td>
</tr>


<tr>
  <td>Subject:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correosubject","id" =>"correosubject");    
echo form_textarea('correosubject',$oficio['correosubject'],$textarea_options ); ?></td>
</tr>


<tr>
  <td>Foot para enviar:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correofoot","id" =>"correofoot");    
echo form_textarea('correofoot',$oficio['correofoot'],$textarea_options ); ?></td>
</tr>










</table>
<?php echo form_close(); ?>
